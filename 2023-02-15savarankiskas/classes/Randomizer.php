<?php

class Randomizer
{

    public static string $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public static function randomString($length): string
    {
        $randomStr = '';
        $characterAmount = strlen(self::$characters);

        for ($i = 0; $i < $length; $i++) {
            $randomStr .= self::$characters[rand(0, $characterAmount - 1)];
        }

        return $randomStr;
    }
}
