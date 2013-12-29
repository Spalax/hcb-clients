<?php
namespace HcbClients\Service\Clients\Client;

use HcbClients\Entity\Client as ClientEntity;
use HcbClients\Data\Clients\BlockInterface;
use Doctrine\ORM\EntityManager;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class BlockService
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var \Zf2Libs\Stdlib\Service\Response\Messages\Response
     */
    protected $response;

    public function __construct(EntityManager $entityManager,
                                Response $response)
    {
        $this->entityManager = $entityManager;
        $this->response = $response;
    }

    /**
     * @param BlockInterface $clientsToBlock
     * @return Response
     */
    public function block(BlockInterface $clientsToBlock)
    {
        try {
            $this->entityManager->beginTransaction();
            $clientEntities = $clientsToBlock->getClients();

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
