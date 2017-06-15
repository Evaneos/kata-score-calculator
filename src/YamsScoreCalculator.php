<?php

namespace Kata;

/**
 * Class StringToInt
 *
 * @package Kata\ScoreCalculator
 **/
class YamsScoreCalculator implements ScoreCalculator
{
    /** @var Combination[] */
    private $combinations;

    public function __construct()
    {
        $this->combinations = [
            new SmallStraightCombination(),
            new BigStraightCombination(),
            new MaxCombination(),
        ];
    }

    /**
     * @param string $value
     *
     * @return int
     */
    public function score(string $value): int
    {
        try {
            $parsedArray = YamsParser::parse($value);
        } catch (\UnexpectedValueException $e) {
            return 0;
        }

        foreach($this->combinations as $combination) {
            if ($combination->isSatisfied($parsedArray)) {
                return $combination->score($parsedArray);
            }
        }

        return 0;
    }
}
