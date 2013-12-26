<?php
namespace HcbClients\Service\Clients\Collection;

use HcBackend\Entity\User as UserEntity;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;

class IdsService
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
     * @param array $ids
     * @return UserEntity[]
     */
    public function fetch(array $ids)
    {
        $qb = $this->entityManager
                   ->getRepository('App\Entity\User')
                   ->createQueryBuilder('u');

        $qb->where($qb->expr()->eq('u.role', UserEntity::ROLE_CLIENT));
        $qb->andWhere($qb->expr()->in('u', $ids));

        return $qb->getQuery()->getResult();
    }
}
