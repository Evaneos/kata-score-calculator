<?php

namespace Evaneos\Kata\Solid;

class NoRollRollsHandler implements RollsHandler
{
    public function handle($rolls)
    {
        return count($rolls) === 0 ? 0 : false;
    }
}
