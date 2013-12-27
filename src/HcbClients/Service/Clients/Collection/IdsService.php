<?php
namespace HcbClients\Service\Clients\Collection;

use HcbClients\Entity\Client as ClientEntity;
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
     * @return ClientEntity[]
     */
    public function fetch(array $ids)
    {
        $qb = $this->entityManager
                   ->getRepository('HcbClients\Entity\Client')
                   ->createQueryBuilder('u');

        $qb->where($qb->expr()->eq('u.role', ClientEntity::ROLE_CLIENT));
        $qb->andWhere($qb->expr()->in('u', $ids));

        return $qb->getQuery()->getResult();
    }
}
