<?php
namespace HcbClients\Service\Clients;

use HcBackend\Data\Collection\Entities\ByIdsInterface;
use HcBackend\Service\CommandInterface;
use HcbClients\Entity\Client as ClientEntity;
use Doctrine\ORM\EntityManager;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class BlockService implements CommandInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager
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

    public function __construct(EntityManager $entityManager,
                                Response $response,
                                ByIdsInterface $blockData)
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
