<?php


class validation
{

    static function string_empty($input)
    {
        $input = trim($input);
        $input = (strlen($input) == 0) ? true : false;
        return $input;
    }
}