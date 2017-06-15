<?php

namespace Calculator;

class ScoreCalculator implements ScoreCalculatorInterface
{
    /**
     * @param string $score
     * @return int
     * @throws \Exception
     */
    public function calculate($score)
    {
        if (preg_match('/^([0-9]{1,};){0,}[0-9]{0,1}$/', $score) == 0) {
            throw new \Exception("Bad format");
        }

        return 0;
    }
}