<?php

namespace common\models\about;
use yii\db\ActiveRecord;

class About extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'about';
    }
    public function rules(): array
    {
        return [
            [['motiv', 'title', 'text', 'first_image', 'last_image'], 'required'],
            [['motiv', 'title', 'text'], 'string'],
            [['first_image'], 'file', 'extensions' => ['jpg', 'jpeg', 'png'], 'maxSize' => 1024 * 1024 * 2],
            [['last_image'], 'file', 'extensions' => ['jpg', 'jpeg', 'png'], 'maxSize' => 1024 * 1024 * 2]
        ];
    }
}