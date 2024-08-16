<?php

namespace Core;


class Validator {

    public static function string($input, $min = 1, $max = 1000) {

        $value = trim($input);

        return  strlen($value) < $min|| strlen($value) > $max;

    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

}