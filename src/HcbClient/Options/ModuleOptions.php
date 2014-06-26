<?php
namespace HcbClient\Options;

use Doctrine\ORM\EntityManagerInterface;
use HcCore\Options\Exception\DomainException;
use Rbac\Role\RoleInterface;
use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements ModuleOptionsInterface, AclOptionsInterface
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var string | int
     */
    protected $defaultUserRole;

    /**
     * Constructor
     *
     * @param EntityManagerInterface $entityManager
     * @param array|\Traversable|null $options
     */
    public function __construct(EntityManagerInterface $entityManager, $options = null)
    {
        $this->entityManager = $entityManager;
        parent::__construct($options);
    }

    /**
     * @param string | int $userRole
     * @return ModuleOptions
     */
    public function setDefaultUserRole($userRole)
    {
        $this->defaultUserRole = $userRole;
    }

    /**
     * @return RoleInterface
     */
    public function getDefaultUserRole()
    {
        $roleEntity = null;
        if (is_numeric($this->defaultUserRole)) {
            $roleEntity = $this->entityManager->find('HcBackend\Entity\HierarchicalRole', $this->default);
        } else if (is_string($this->defaultUserRole)) {
            $repo = $this->entityManager->getRepository('HcBackend\Entity\HierarchicalRole');
            $roleEntity = $repo->findOneByName($this->defaultUserRole);
        } else {
            throw new DomainException("Invalid role type must be name of the role or it is id");
        }

        if (is_null($roleEntity)) {
            throw new DomainException("Could not find required role ['{$this->defaultUserRole}']");
        }

        return $roleEntity;
    }
}
