<?php

namespace backend\controllers;
use common\models\MainImg\MainImg;
use common\widgets\UploadFile;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class BannerController extends BaseController
{
    public function actionIndex()
    {
        $model = MainImg::find()->one() ?? new MainImg();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $main_img = UploadedFile::getInstance($model, 'main_img');
                $model->main_img = $main_img ? UploadFile::saveFile($main_img) : $model->getOldAttribute('main_img');

                $banners = UploadedFile::getInstance($model, 'banners');
                $model->banners = $banners ? UploadFile::saveFile($banners) : $model->getOldAttribute('banners');
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