<?php
namespace HcbClient\Service\Collection;

use HcCore\Service\Collection\IdsServiceInterface;
use HcbClient\Entity\User as ClientEntity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Zend\Di\Di;

class IdsService implements IdsServiceInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var \Zend\Di\Di
     */
    protected $di;

    /**
     * @param EntityManagerInterface $entityManager
     * @param Di $di
     */
    public function __construct(EntityManagerInterface $entityManager,
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

        /* @var $qb QueryBuilder */
        $qb = $this->entityManager
                   ->getRepository('HcbClient\Entity\User')
                   ->createQueryBuilder('u');

        $qb->where($qb->expr()->eq('u.role', ClientEntity::ROLE_CLIENT));
        $qb->andWhere($qb->expr()->in('u', array_map(function ($id) use ($digitsFilter){
            return $digitsFilter->filter($id);
        }, $ids)));

        return $qb->getQuery()->getResult();
    }
}