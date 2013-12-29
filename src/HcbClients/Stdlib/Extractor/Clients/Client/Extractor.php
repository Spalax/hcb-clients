<?php
namespace HcbClients\Stdlib\Extractor\Clients\Client;

use Zf2Libs\Stdlib\Extractor\ExtractorInterface;
use Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException;
use HcbClients\Entity\Client as ClientEntity;

class Extractor implements ExtractorInterface
{
    /**
     * Extract values from an object
     *
     * @param  ClientEntity $user
     * @throws \Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException
     * @return array
     */
    public function extract($user)
    {
        if (!$user instanceof ClientEntity) {
            throw new InvalidArgumentException("Expected HcbClients\\Entity\\Client object, invalid object given");
        }
        return array('id'=>$user->getId(),
                     'username'=>$user->getUsername(),
                     'fullname'=>$user->getDisplayName(),
                     'state'=>$user->getState());
    }
}
