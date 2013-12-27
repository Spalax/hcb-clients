<?php
namespace HcbClients\Data\Clients;

interface BlockInterface
{
    /**
     * @return \HcbClients\Entity\Client[]
     */
    public function getClients();
}
