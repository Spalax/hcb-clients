<?php
namespace HcbClientsTest\Service\Clients\Client;

use HcbClients\Service\Clients\Client\BlockCommand;

class BlockCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $blockData = $this->getMock('HcbClients\Data\Clients\BlockInterface');
        $blockService = $this->getMock('HcbClients\Service\Clients\Client\BlockService',
                                       array(), array(), '', false);
        $response = $this->getMock('Zf2Libs\Stdlib\Service\Response\Messages\Response');

        $blockService->expects($this->once())
                     ->method('block')
                     ->with($blockData)
                     ->will($this->returnValue($response));

        $command = new BlockCommand($blockData, $blockService);
        $this->assertEquals($response, $command->execute());
    }
}
