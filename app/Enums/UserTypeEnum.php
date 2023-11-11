<?php

namespace App\Enums;

class UserTypeEnum extends BaseEnum
{
    public const ADMIN = 10;
    public const MEDITATOR = 20;

    public static function list($withText = false)
    {
        return ($withText) ? [
            self::ADMIN => 'Admin',
            self::MEDITATOR => 'Meditator'
        ] : [self::ADMIN, self::MEDITATOR];
    }
}