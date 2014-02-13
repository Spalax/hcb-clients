<?php
namespace HcbClient\Stdlib\Extractor;

use Zf2Libs\Stdlib\Extractor\ExtractorInterface;
use Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException;
use HcbClient\Entity\User as ClientEntity;

class Client implements ExtractorInterface
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
            throw new InvalidArgumentException("Expected HcbClient\\Entity\\Client object, invalid object given");
        }
        return array('id'=>$user->getId(),
                     'username'=>$user->getUsername(),
                     'email'=>$user->getEmail(),
                     'state'=>$user->getState());
    }
}
