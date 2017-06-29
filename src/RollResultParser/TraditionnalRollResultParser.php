<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 18:14
 */

namespace Kata\ScoreCalculator\RollResultParser;


use Kata\ScoreCalculator\DiceFace\TraditionnalDiceFace;
use Kata\ScoreCalculator\Roll;
use Kata\ScoreCalculator\RollResultParser;

class TraditionnalRollResultParser implements RollResultParser
{

    public function parseRollResult(string $rollResult) : Roll
    {
        return new Roll(array_map(function ($value) {
            return TraditionnalDiceFace::fromValue((int) $value);
        }, explode(';', $rollResult)));
    }
}