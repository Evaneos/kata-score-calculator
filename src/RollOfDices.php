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
     * @return DiceFace[]
     */
    public function getDicesFace(): array
    {
        return $this->dicesFace;
    }

    /**
     * @return array
     */
    public function getRawDiceValues(): array
    {
        return array_map(
            function (DiceFace $face) {
                return $face->getValue();
            },
            $this->getDicesFace()
        );
    }

}
