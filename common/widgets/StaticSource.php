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

    public static function cardHeaderColors(): string
    {
        $rand = rand(0, 4);
        return [
            'bg-primary text-white',
            'bg-success text-white',
            'bg-info text-white',
            'bg-dark text-white',
            'bg-warning text-light'
        ][$rand];
    }
}