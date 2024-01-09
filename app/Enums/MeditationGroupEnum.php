<?php

namespace App\Enums;

class MeditationGroupEnum extends BaseEnum
{
    public const SINGLE = 10;
    public const MULTIPLE = 20;

    public static function list($withText = false)
    {
        return ($withText) ? [
            self::SINGLE => 'Single',
            self::MULTIPLE => 'Multiple'
        ] : [self::SINGLE, self::MULTIPLE];
    }
}