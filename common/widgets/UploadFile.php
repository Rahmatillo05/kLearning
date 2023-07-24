<?php

namespace common\widgets;

use Yii;
use yii\web\UploadedFile;

class UploadFile
{
    public static function saveFile(UploadedFile $file): bool|string
    {
        $name = 'IMG_' . date('Ymd_His') . "." . $file->extension;
        $path = Yii::$app->params['uploadPath'] . $name;
        if ($file->saveAs($path)) {
            return $name;
        }
        return false;
    }
}