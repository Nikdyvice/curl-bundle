<?php

namespace Tests\Nikdyvice\CurlBundle\DependencyInjection;

use Nikdyvice\CurlBundle\DependencyInjection\CurlExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CurlExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testHasServicesDefinition()
    {
        $container = new ContainerBuilder();
        $loader = new CurlExtension();
        $loader->load([], $container);
        $this->assertTrue($container->hasDefinition('curl.factory'), 'Factory service definition is missing.');
        $this->assertTrue($container->hasDefinition('curl.client'), 'Curl client definition is missing.');
    }
}
