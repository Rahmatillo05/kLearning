<?php

namespace common\widgets;

use Yii;
use yii\web\UploadedFile;

class UploadFile
{
    public static function saveFile(UploadedFile $file, string $old_image): bool|string
    {
        $name = 'IMG_' . date('Ymd_His') . "{$file->baseName}." . $file->extension;
        $path = Yii::$app->params['uploadPath'] . $name;
        $old_image_path = Yii::$app->params['uploadPath'] . $old_image;
        if (empty($old_image) || !file_exists($old_image_path)) {
            if ($file->saveAs($path)) {
                return $name;
            }
        } else{
            if ($file->saveAs($path) && unlink($old_image_path)) {
                return $name;
            }
        }
        return false;
    }
}
