<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 29/06/2017
 * Time: 16:39
 */

namespace Kata\ScoreCalculator;

interface DiceFace
{
    /**
     * @return int
     */
    public function getValue(): int;

    /**
     * @return string
     */
    public function face(): string;
}
