<?php

namespace Kata;


/**
 * Class YamsParser
 *
 * @package Kata
 **/
class YamsParser
{
    /**
     * @param string $string
     *
     * @return int[]
     *
     * @throws \UnexpectedValueException
     */
    public static function parse(string $string)
    {
        if (empty($string)) {
            throw new \UnexpectedValueException('String could not be empty');
        }

        return array_map('intval', (explode(';', $string)));
    }
}
