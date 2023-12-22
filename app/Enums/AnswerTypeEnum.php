<?php

namespace App\Enums;

class AnswerTypeEnum extends BaseEnum
{
    public const PACKAGE = 10;
    public const MEDICINE = 20;

    public static function list($withText = false)
    {
        return ($withText) ? [
            self::PACKAGE => 'Pakcage',
            self::MEDICINE => 'Medicine'
        ] : [self::PACKAGE, self::MEDICINE];
    }
}