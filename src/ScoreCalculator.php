<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 15:11
 */

namespace Kata\ScoreCalculator;

use Assert\Assertion;

class ScoreCalculator
{
    /** @var Combination[] */
    private $combinations;

    /**
     * ScoreCalculator constructor.
     *
     * @param Combination[] $combinations
     */
    public function __construct(array $combinations)
    {
        Assertion::allIsInstanceOf($combinations, Combination::class);

        $this->combinations = $combinations;
    }

    /**
     * @param Roll $roll
     * @return int
     */
    public function calculateScore(Roll $roll): int
    {
        $scores = [];
        foreach ($this->combinations as $combination) {
            if ($combination->satisfies($roll)) {
                $scores[] = $combination->getScore($roll);
            }
        }

        return max($scores);
    }
}