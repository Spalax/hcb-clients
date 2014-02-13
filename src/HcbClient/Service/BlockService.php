<?php
namespace HcbClient\Service;

use HcCore\Data\Collection\Entities\ByIdsInterface;
use HcCore\Service\CommandInterface;
use HcbClient\Entity\User as ClientEntity;
use Doctrine\ORM\EntityManagerInterface;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class BlockService implements CommandInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var \Zf2Libs\Stdlib\Service\Response\Messages\Response
     */
    protected $response;

    /**
     * @var ByIdsInterface
     */
    protected $blockData;

    /**
     * @param EntityManagerInterface $entityManager
     * @param Response $response
     * @param ByIdsInterface $blockData [OPTIONAL]
     */
    public function __construct(EntityManagerInterface $entityManager,
                                Response $response,
                                ByIdsInterface $blockData = null)
    {
        $this->entityManager = $entityManager;
        $this->response = $response;
        $this->blockData = $blockData;
    }

    /**
     * @return Response
     */
    public function execute()
    {
        return $this->block($this->blockData);
    }

    /**
     * @param ByIdsInterface $clientsToBlock
     * @return Response
     */
    public function block(ByIdsInterface $clientsToBlock)
    {
        try {
            $this->entityManager->beginTransaction();
            $clientEntities = $clientsToBlock->getEntities();

            /* @var $clientEntities ClientEntity[] */
            foreach ($clientEntities as $clientEntity) {
                $clientEntity->setState(ClientEntity::STATE_BLOCKED);
                $this->entityManager->persist($clientEntity);
            }

            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->response->error($e->getMessage())->failed();
            return $this->response;
        }

        $this->response->success();
        return $this->response;
    }
}
