<?php
namespace HcbClient\Service;

use HcCore\Service\Fetch\Paginator\QueryBuilder\DataServiceInterface;
use HcCore\Service\Sorting\SortingServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use HcbClient\Entity\User as ClientEntity;
use Zend\Stdlib\Parameters;

class FetchQbBuilderService implements DataServiceInterface
{
    /**
     * @var SortingServiceInterface
     */
    protected $sortingService;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager,
                                SortingServiceInterface $sortingService)
    {
        $this->entityManager = $entityManager;
        $this->sortingService = $sortingService;
    }

    /**
     * @param Parameters $params
     * @return QueryBuilder
     */
    public function fetch(Parameters $params = null)
    {
        /* @var $qb QueryBuilder */
        $qb = $this->entityManager
                   ->getRepository('HcbClient\Entity\User')
                   ->createQueryBuilder('c');

        $qb->where('c.role = :roleId')
           ->setParameter('roleId', ClientEntity::ROLE_CLIENT);

        if (is_null($params)) return $qb;
        return $this->sortingService->apply($params, $qb, 'u');
    }
}
