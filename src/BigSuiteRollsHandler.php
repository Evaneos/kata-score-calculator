<?php

namespace Evaneos\Kata\Solid;

class BigSuiteRollsHandler implements RollsHandler
{
    public function handle($rolls)
    {
        rsort($rolls);
        if($rolls[0] === 6) {
            $isBigSuite = true;
            foreach ($rolls as $pos => $roll) {
                if ($roll !== 6 - $pos) {
                    $isBigSuite = false;
                    break;
                }
            }

            if ($isBigSuite) {
                return 25;
            }
        }
        return false;
    }
}
