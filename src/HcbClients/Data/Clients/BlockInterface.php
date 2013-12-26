<?php
namespace HcbClients\Data\Clients;

interface BlockInterface
{
    /**
     * @return \HcBackend\Entity\User[]
     */
    public function getClients();
}
