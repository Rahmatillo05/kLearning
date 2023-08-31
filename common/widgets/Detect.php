<?php

namespace common\widgets;

use common\models\user\User;
use common\models\user\UserRole;

class Detect
{
    // STATUS TYPES
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    ////-------///////

    //COMMENT TYPES
    const READ = 10;
    const NOT_READ = 0;
    const REPLY = 10;
    const NOT_REPLY = 0;
    //-------/////

    //USER ROLES
    const OWNER = 10;
    const MANAGER = 8;
    const TEACHER = 6;
    const PARENT = 4;
    const PUPIL = 2;
    //-----------////////

    // PAYMENT TYPES
    const PAYMENT_PLASTIC = 0;
    const PAYMENT_CASH = 10;

    //------------////////

    public static function teachers(): array
    {
        return User::findAll(['role' => self::TEACHER]);
    }

    public static function detectRole(int $user_role): string
    {
        $base_role = UserRole::findOne(['role_power' => $user_role]);
        return "/" . strtolower($base_role->role_name);
    }

    public static function dtmStatus(int $status, bool $for_front = false): string
    {
        if ($for_front) {
            if ($status == self::STATUS_DELETED) {
                return "<span class='badge badge-danger rounded-3 fw-semibold'>Test yakunlangan</span>";
            } elseif ($status == self::STATUS_INACTIVE) {
                return "<span class='badge badge-warning rounded-3 fw-semibold'>Tekshirilmoqda</span>";
            }
            return "<span class='badge badge-success rounded-3 fw-semibold'>Qabul ochiq</span>";
        }
        if ($status == self::STATUS_DELETED) {
            return "<span class='badge bg-danger rounded-3 fw-semibold'>Test yakunlangan</span>";
        } elseif ($status == self::STATUS_INACTIVE) {
            return "<span class='badge bg-warning rounded-3 fw-semibold'>Tekshirilmoqda</span>";
        }
        return "<span class='badge bg-success rounded-3 fw-semibold'>Qabul ochiq</span>";
    }

    public static function setStatusBadge($status): string
    {
        if ($status == self::NOT_REPLY) {
            return "<span class='badge bg-danger rounded-3 fw-semibold'>Ogohlantirilmagan </span>";
        } else {
            return "<span class='badge bg-success rounded-3 fw-semibold'>Ogohlantirilgan</span>";
        }
    }

    public static function paymentStatus(?int $payment_type): string
    {
        if ($payment_type == self::PAYMENT_CASH) {
            return "<span class='badge bg-success rounded-3 fw-semibold'>Naqd Pul</span>";
        }
        return "<span class='badge bg-warning rounded-3 fw-semibold'>Online to'lov</span>";
    }
}