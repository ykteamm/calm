<?php

namespace App\Enums;

class QuestionTypeEnum extends BaseEnum
{
    public const MAIN = 10;
    public const SIMPLE = 20;

    public static function list($withText = false)
    {
        return ($withText) ? [
            self::MAIN => 'Main',
            self::SIMPLE => 'Simple'
        ] : [self::MAIN, self::SIMPLE];
    }
}