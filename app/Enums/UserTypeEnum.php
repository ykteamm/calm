<?php

namespace App\Enums;

class UserTypeEnum extends BaseEnum
{
    public const SYSTEM_USER = 10;
    public const WEB_USER = 20;

    public static function list($withText = false)
    {
        return ($withText) ? [
            self::SYSTEM_USER => 'System User',
            self::WEB_USER => 'Web User'
        ] : [self::SYSTEM_USER, self::WEB_USER];
    }
}