<?php

namespace frontend\modules\teacher\controllers;

use common\models\dtm\Dtm;
use kartik\mpdf\Pdf;
use Mpdf\MpdfException;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use Yii;
use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class DtmController extends Controller
{
    public function actionIndex()
    {
        $dtm = new ActiveDataProvider([
            'query' => Dtm::find(),
            'pagination' => [
                'pageSize' => 40
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);
        return $this->render('index', compact('dtm'));
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        $model = $this->findModel($id);
        return $this->render('view', compact('model'));
    }

    /**
     * @throws CrossReferenceException
     * @throws MpdfException
     * @throws InvalidConfigException
     * @throws PdfParserException
     * @throws NotFoundHttpException
     * @throws PdfTypeException
     */
    public function actionResultDownload(int $id): string
    {
        $model = $this->findModel($id);
        Yii::$app->response->format = Response::FORMAT_RAW;
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $this->renderPartial('_dtm_result', compact('model')),
            'methods' => [
                'SetTitle' => $model->title,
                'SetAuthor' => Yii::$app->name,
                'SetCreator' => Yii::$app->name,
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }

    private function findModel(int $id): ?Dtm
    {
        if (($model = Dtm::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Safiha topilmadi.');
    }
}
