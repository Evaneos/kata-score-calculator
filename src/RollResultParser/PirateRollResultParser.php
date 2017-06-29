<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 18:14
 */

namespace Kata\ScoreCalculator\RollResultParser;


use Kata\ScoreCalculator\DiceFace\PirateDiceFace;
use Kata\ScoreCalculator\Roll;
use Kata\ScoreCalculator\RollResultParser;

class PirateRollResultParser implements RollResultParser
{

    public function parseRollResult(string $rollResult) : Roll
    {
        return new Roll(array_map(function ($value) {
            return PirateDiceFace::fromFace($value);
        }, explode(';', $rollResult)));
    }
}