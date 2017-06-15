<?php

namespace Evaneos\Kata\Solid;

class SmallSuiteRollsHandler implements RollsHandler
{
    public function handle($rolls)
    {
        sort($rolls);
        if($rolls[0] === 1) {
            $isSmallSuite = true;
            foreach ($rolls as $pos => $roll) {
                if ($roll !== $pos + 1) {
                    $isSmallSuite = false;
                    break;
                }
            }

            if ($isSmallSuite) {
                return 15;
            }
        }
        return false;
    }
}
