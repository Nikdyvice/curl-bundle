<?php

namespace Nikdyvice\CurlBundle\Factory;

use Curl\Curl;

class CurlFactory
{
    /**
     * @param $url
     * @param array $options
     * @return Curl
     */
    public static function createClient($url, array $options = [])
    {
        $curl = new Curl($url);
        $curl->setOpts(static::convertConstants($options));

        return $curl;
    }

    /**
     * @param $options
     * @return array
     */
    private static function convertConstants(array $options)
    {
        $out = [];

        foreach ($options as $key => $option) {
            if (is_string($key)) {
                $key = constant(strtoupper($key));
            }

            $out[$key] = $option;
        }

        return $out;
    }
}