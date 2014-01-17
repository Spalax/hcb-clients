<?php
namespace HcbClients\Service\Clients\Collection;

use HcBackend\Service\Collection\IdsServiceInterface;
use HcbClients\Entity\Client as ClientEntity;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Zend\Di\Di;

class IdsService implements IdsServiceInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var \Zend\Di\Di
     */
    protected $di;

    /**
     * @param EntityManager $entityManager
     * @param Di $di
     */
    public function __construct(EntityManager $entityManager,
                                Di $di)
    {
        $this->entityManager = $entityManager;
        $this->di = $di;
    }

    /**
     * @param array $ids
     * @return ClientEntity[]
     */
    public function fetch(array $ids)
    {
        $digitsFilter = $this->di->get('Zend\Filter\Digits');

        $qb = $this->entityManager
                   ->getRepository('HcbClients\Entity\Client')
                   ->createQueryBuilder('u');

        $qb->where($qb->expr()->eq('u.role', ClientEntity::ROLE_CLIENT));
        $qb->andWhere($qb->expr()->in('u', array_map(function ($id) use ($digitsFilter){
            return $digitsFilter->filter($id);
        }, $ids)));

        return $qb->getQuery()->getResult();
    }
}
