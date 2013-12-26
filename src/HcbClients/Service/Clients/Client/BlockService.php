<?php
namespace HcbClients\Service\Clients\Client;

use HcBackend\Entity\User as UserEntity;
use HcbClients\Data\Clients\BlockInterface;
use Doctrine\ORM\EntityManager;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class BlockService
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param BlockInterface $clientsToBlock
     * @return Response
     */
    public function block(BlockInterface $clientsToBlock)
    {
        $response = new Response();

        try {
            $this->entityManager->beginTransaction();
            $clientEntities = $clientsToBlock->getClients();
            /* @var $clientEntities UserEntity[] */
            foreach ($clientEntities as $clientEntity) {
                $clientEntity->setState(UserEntity::STATE_BLOCKED);
                $this->entityManager->persist($clientEntity);
            }

            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $response->error($e->getMessage())->failed();
            return $response;
        }

        $response->success();
        return $response;
    }
}
