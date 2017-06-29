<?php

namespace Calculator;

class Dice
{
    private $face;
    private $value;

    public function __construct($face, $value)
    {
        $this->face = $face;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getFace()
    {
        return $this->face;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}