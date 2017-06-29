<?php

namespace Calculator;

class CombinationFormatter {

    const MIN_VALUE = 1;

    const MAX_VALUE = 6;

    const NB_LAUCH = 5;

    /**
     * @param $combination
     * @return array
     * @throws \Exception
     */
    public static function formatToArray($combination) {
        $pattern = '/^([' . self::MIN_VALUE . '-' . self::MAX_VALUE . '];){'. (self::NB_LAUCH - 1) . ',' . (self::NB_LAUCH - 1) . '}[' . self::MIN_VALUE . '-' . self::MAX_VALUE . ']{1,1}$/';
        if (preg_match($pattern, $combination) == 0) {
            throw new \Exception("Bad format");
        }
        return explode(';', $combination);
    }
}
