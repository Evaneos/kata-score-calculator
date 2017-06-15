<?php

namespace Evaneos\Kata\Solid;

class InputParser
{
    private $input;

    /*public function __construct($input)
    {
        if (!preg_match('/^(?:[1-6])(?:;[1-6])*$/', $input)) {
            throw new \InvalidArgumentException('We expect rolls from a dice-6 separated by semi-colon');
        }
        $this->input = $input;
    }*/

    /**
     * @return int[]
     */
    public function parse($input)
    {
        return array_map(function($roll) {
                return (int) $roll;
            },
            explode(';', $input)
        );

    }
}
