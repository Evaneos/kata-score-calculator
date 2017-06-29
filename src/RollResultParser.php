<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 29/06/2017
 * Time: 17:12
 */

namespace Kata\ScoreCalculator;

interface RollResultParser
{
    /**
     * @param string $rollResult
     * @return Roll
     */
    public function parseRollResult(string $rollResult): Roll;
}