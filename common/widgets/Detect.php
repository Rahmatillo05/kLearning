<?php

namespace common\widgets;

use common\models\user\User;
use common\models\user\UserRole;

class Detect
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    const READ = 10;
    const NOT_READ = 0;
    const REPLY = 10;
    const NOT_REPLY = 0;

    const OWNER = 10;
    const MANAGER = 8;
    const TEACHER = 6;
    const PARENT = 4;
    const PUPIL = 2;

    public static function teachers(): array
    {
        return User::findAll(['role' => self::TEACHER]);
    }

    public static function detectRole(int $user_role): string
    {
        $base_role = UserRole::findOne(['role_power' => $user_role]);
        return "/".strtolower($base_role->role_name);
    }
}