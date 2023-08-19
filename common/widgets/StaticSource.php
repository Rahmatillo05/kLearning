<?php

namespace common\widgets;

class StaticSource
{
    public static function weekDays(): array
    {
        return [
            'Dushanba' => 'Dushanba',
            'Seshanba' => 'Seshanba',
            'Chorshanba' => 'Chorshanba',
            'Payshanba' => 'Payshanba',
            'Juma' => 'Juma',
            'Shanba' => 'Shanba',
            'Yakshanba' => 'Yakshanba'
        ];
    }

    public static function dtmStatus(): array
    {
        return [
          Detect::STATUS_ACTIVE => "Qabul ochiq",
          Detect::STATUS_INACTIVE => "Natija kutilmoqda",
          Detect::STATUS_DELETED => "Test yakunlangan"
        ];
    }
}