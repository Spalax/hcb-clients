<?php
namespace HcbClients\Service\Clients\Client;

use HcbClients\Data\Clients\BlockInterface;
use HcBackend\Service\CommandInterface;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class BlockCommand implements CommandInterface
{
    /**
     * @var BlockInterface
     */
    protected $data;

    /**
     * @var BlockService
     */
    protected $service;

    /**
     * @param BlockInterface $data
     * @param BlockService $service
     */
    public function __construct(BlockInterface $data,
                                BlockService $service)
    {
        $this->data = $data;
        $this->service = $service;
    }

    /**
     * @return Response
     */
    public function execute()
    {
        return $this->service->block($this->data);
    }
}
