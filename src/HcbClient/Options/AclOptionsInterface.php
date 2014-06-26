<?php
namespace HcbClient\Options;

use Rbac\Role\RoleInterface;

interface AclOptionsInterface
{
    /**
     * @param string $userRole
     * @return ModuleOptions
     */
    public function setDefaultUserRole($userRole);

    /**
     * @return RoleInterface
     */
    public function getDefaultUserRole();
}
