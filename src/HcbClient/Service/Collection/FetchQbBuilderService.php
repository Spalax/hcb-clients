<?php
namespace HcbClient\Service\Collection;

use HcbClient\Options\AclOptionsInterface;
use HcCore\Service\Fetch\Paginator\QueryBuilder\DataServiceInterface;
use HcCore\Service\Sorting\SortingServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
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

    /**
     * @var AclOptionsInterface
     */
    protected $moduleOptions;

    public function __construct(EntityManagerInterface $entityManager,
                                SortingServiceInterface $sortingService,
                                AclOptionsInterface $moduleOptions)
    {
        $this->entityManager = $entityManager;
        $this->sortingService = $sortingService;
        $this->moduleOptions = $moduleOptions;
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
                   ->createQueryBuilder('u');

        $qb->join('u.roles', 'r')
           ->andWhere('r = :role')
           ->setParameter('role',
                          $this->moduleOptions->getDefaultUserRole());

        if (is_null($params)) return $qb;
        return $this->sortingService->apply($params, $qb, 'u');
    }
}
