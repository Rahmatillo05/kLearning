<?php

use common\models\course\Category;
use common\widgets\Tools;
use kartik\editable\Editable;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/**
 * @var Category $model
 */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <h4 class="card-title card-header"><?= Html::encode($this->title) ?></h4>
    <?= $this->render('_form', compact('model')) ?>
    <div class="card-body pt-1 table-responsive">
        
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><?= $dataProvider->sort->link('id') ?></th>
                <th><?= $dataProvider->sort->link('name') ?></th>
                <th><?= $dataProvider->sort->link('status') ?></th>
                <th><?= $dataProvider->sort->link('created_at') ?></th>
            </tr>
            </thead>
            <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{items} \n {pager}",
                'itemView' => '_item',
                'pager' => [
                    'class' => LinkPager::class
                ]
            ]) ?>
            </tbody>
        </table>
    </div>
</div>
