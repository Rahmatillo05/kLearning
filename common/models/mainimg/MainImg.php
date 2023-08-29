<?php

namespace common\models\MainImg;
use yii\db\ActiveRecord;

class MainImg extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'main_img';
    }
    public function rules(): array
    {
        return [
            [['motiv', 'title', 'main_img'], 'required'],
            [['motiv', 'title'], 'string'],
            [['main_img'], 'file', 'extensions' => ['jpg', 'jpeg', 'png'], 'maxSize' => 1024 * 1024 * 2]
        ];
    }
}