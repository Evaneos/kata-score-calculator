<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 29/06/2017
 * Time: 15:58
 */

namespace Kata\ScoreCalculator;


class Yahtzee
{
    /**
     * @var RollResultParser
     */
    private $parser;

    /**
     * @var ScoreCalculator
     */
    private $scoreCalculator;

    /**
     * Yahtzee constructor.
     * @param RollResultParser $parser
     * @param ScoreCalculator $scoreCalculator
     */
    public function __construct(RollResultParser $parser, ScoreCalculator $scoreCalculator)
    {
        $this->parser = $parser;
        $this->scoreCalculator = $scoreCalculator;
    }

    /**
     * @param string $rollResult
     * @return int
     */
    public function roll(string $rollResult) : int
    {
        $roll = $this->parser->parseRollResult($rollResult);

        return $this->scoreCalculator->calculateScore($roll);
    }
}