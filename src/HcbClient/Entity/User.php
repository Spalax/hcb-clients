<?php
namespace HcbClient\Entity;

use Doctrine\ORM\Mapping as ORM;
use HcBackend\Entity\MappedUser;

/**
 * Client
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends MappedUser
{
    const STATE_BLOCKED = 4;
    const ROLE_CLIENT = 2;
}
