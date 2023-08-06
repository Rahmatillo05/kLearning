<?php


use yii\bootstrap5\LinkPager;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kurslar';
$this->params['breadcrumbs'][] = $this->title;
$query = Yii::$app->request->get('q');

?>
<section class="ftco-section bg-light" id="course_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 sidebar">
                <div class="sidebar-box bg-white ftco-animate">
                    <form method="get" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" value="<?= $query ?>" autocomplete="off" name="q"
                                   placeholder="Qidirish...">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?=
        ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item',
            'layout' => "{items}\n{pager}",
            'options' => [
                'class' => 'row'
            ],
            'itemOptions' => [
                'class' => 'col-md-6 col-lg-4 d-flex align-items-stretch ftco-animate'
            ],
            'pager' => [
                'class' => LinkPager::class,
                'options' => [
                    'class' => 'col-12'
                ],
                'maxButtonCount' => 5
            ],
            'emptyText' => "<div class='col-12'><h3 class='text-warning'>Hech qanday kurs topilmadi!</h3></div>"
        ]);
        ?>
</section>
