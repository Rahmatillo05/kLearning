<?php

namespace backend\controllers;
use common\models\about\About;
use common\widgets\Tools;
use common\widgets\UploadFile;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class AboutController extends BaseController
{
    public function actionIndex()
    {
        $model = About::find()->one() ?? new About();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $first_image = UploadedFile::getInstance($model, 'first_image');
                $model->first_image = $first_image ? UploadFile::saveFile($first_image, $model->getOldAttribute('first_image')) : $model->getOldAttribute('first_image');
                $last_image = UploadedFile::getInstance($model, 'last_image');
                $model->last_image = $last_image ? UploadFile::saveFile($last_image, $model->getOldAttribute('last_image')) : $model->getOldAttribute('last_image');
                if ($model->save()) {
                    return $this->redirect(['index']);
                }else{
                    VarDumper::dump( $model->errors, $depth = 10, $highlight = true);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}