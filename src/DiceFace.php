<?php

namespace Kata\ScoreCalculator;

class DiceFace
{
    /**
     * @var int
     */
    private $faceValue;

    /**
     * DiceFace constructor.
     * @param int $faceValue
     */
    public function __construct(int $faceValue)
    {
        $this->faceValue = $faceValue;
    }

    function getValue(): int
    {
        return $this->faceValue;
    }


}