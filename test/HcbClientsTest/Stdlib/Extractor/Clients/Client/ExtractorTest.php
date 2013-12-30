<?php
namespace HcbClientsTest\Stdlib\Extractor\Clients\Client;

use HcbClients\Entity\Client;
use HcbClients\Stdlib\Extractor\Clients\Client\Extractor;

class ExtractorTest extends \PHPUnit_Framework_TestCase
{
    public function testExtract()
    {
        $client = new Client();

        $client->setUsername('Test');
        $client->setDisplayName('Pest');
        $client->setState(12);

        $extractor = new Extractor();
        $result = $extractor->extract($client);
        $this->assertEquals(array('id'=>'',
                                  'username'=>'Test',
                                  'fullname'=>'Pest',
                                  'state'=>12),
                            $result);
    }

    public function testExtractException()
    {
        $client = new \stdClass();

        $extractor = new Extractor();
        $this->setExpectedException('InvalidArgumentException');

        $extractor->extract($client);
    }
}
