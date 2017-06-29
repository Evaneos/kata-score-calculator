<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 18:14
 */

namespace Kata\ScoreCalculator;


class RollResultParser
{

    public function parseRollResult(string $rollResult) : Roll
    {
        return new Roll(array_map(function ($value) {
            return DiceFace::fromValue((int) $value);
        }, explode(';', $rollResult)));
    }
}