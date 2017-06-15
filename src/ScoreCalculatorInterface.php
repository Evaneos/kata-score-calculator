<?php

namespace Calculator;

interface ScoreCalculatorInterface {

    /**
     * @param string $score
     * @return int
     */
    public function calculate($score);
}