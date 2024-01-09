<?php

namespace App\Enums;

class MeditationTypeEnum extends BaseEnum
{
    public const MASTERCLASS = 10;
    public const COURSE = 20;

    public static function list($withText = false)
    {
        return ($withText) ? [
            self::COURSE => 'Kurs',
            self::MASTERCLASS => 'Masterklass'
        ] : [self::COURSE, self::MASTERCLASS];
    }
}