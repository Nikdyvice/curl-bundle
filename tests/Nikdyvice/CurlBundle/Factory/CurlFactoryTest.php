<?php

namespace Tests\Nikdyvice\CurlBundle\Factory;


use Curl\Curl;
use Nikdyvice\CurlBundle\Factory\CurlFactory;

class CurlFactoryTest extends \PHPUnit_Framework_TestCase
{

    private $testUrl = 'http://www.example.com';

    public function testGetInstanceOfCurlClient()
    {
        $client = CurlFactory::createClient($this->testUrl);

        $constraint = $this->isInstanceOf(Curl::class);

        $constraint->evaluate($client, 'Expected instance of Curl\Curl class');
    }

    public function testSetOptionFromConstant()
    {
        $client = CurlFactory::createClient($this->testUrl, [
            CURLOPT_TIMEOUT => 300
        ]);

        $this->assertEquals(300, $client->getOpt(CURLOPT_TIMEOUT), 'Option was not set.');
    }

    public function testSetOptionFromString()
    {
        $client = CurlFactory::createClient($this->testUrl, [
            'CURLOPT_TIMEOUT' => 300
        ]);

        $this->assertEquals(300, $client->getOpt(CURLOPT_TIMEOUT), 'Option was not set.');
    }

    public function testSetOptionFromLowerCaseString()
    {
        $client = CurlFactory::createClient($this->testUrl, [
            'curlopt_timeout' => 300
        ]);

        $this->assertEquals(300, $client->getOpt(CURLOPT_TIMEOUT), 'Option was not set.');
    }

}