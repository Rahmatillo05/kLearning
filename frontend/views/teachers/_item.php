<?php
/**
 * @var User $model
 */

use common\models\user\User;
use common\widgets\Tools;
use yii\helpers\Url;

?>
<?php
if (!$model) {
   echo "Malumotlar topilmadi"; 
}else{
    ?>
    <div class="staff">
    <div class="img-wrap d-flex align-items-stretch">
        <div class="img align-self-stretch" style="background-image: url(<?= Yii::getAlias('@images') ?>/<?=  $model->userInfo->image ?? ''   ?>);"></div>
    </div>
    <div class="text pt-3">
        <h3><a href="<?= Url::to(['/teachers/view', 'id' => $model->id]) ?>"><?= $model->full_name ?? ''?></a></h3>
        <span class="position mb-2 text-capitalize"><?= $model->userInfo->job ?? ''?></span>
        <div class="faded">
            <p><?= substr($model->userInfo->about ?? '', 0, 50) ?>...</p>
            <?= Tools::renderTeacherSocials($model->socialAccount ) ?>
        </div>
    </div>
</div>
    <?php
}
?>
