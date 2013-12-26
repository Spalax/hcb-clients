<?php
namespace HcbClients\Stdlib\Extractor\Clients\Client;

use Zf2Libs\Stdlib\Extractor\ExtractorInterface;
use Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException;
use HcBackend\Entity\User as UserEntity;

class Extractor implements ExtractorInterface
{
    /**
     * Extract values from an object
     *
     * @param  object $user
     * @throws \Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException
     * @return array
     */
    public function extract($user)
    {
        if (!$user instanceof UserEntity) {
            throw new InvalidArgumentException("Expected HcBackend\\Entity\\User object, invalid object given");
        }
        return array('id'=>$user->getId(),
                     'username'=>$user->getUsername(),
                     'fullname'=>$user->getDisplayName(),
                     'state'=>$user->getState());
    }
}
