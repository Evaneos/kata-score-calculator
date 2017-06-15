<?php

namespace Kata\ScoreCalculator;

class RollOfDices
{
    /**
     * @var DiceFace[]
     */
    private $dicesFace;

    /**
     * RollOfDices constructor.
     * @param string $rawRollOfDices
     */
    public function __construct($rawRollOfDices)
    {
        $this->dicesFace = array_map(
            function ($faceValue) {
                return new DiceFace((int)$faceValue);
            },
            explode(';', $rawRollOfDices)
        );
    }

    /**
     * @return array
     */
    public function getDicesFace(): array
    {
        return $this->dicesFace;
    }
}