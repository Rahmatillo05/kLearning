<?php

/**
 * @var Category $model
 */

use common\models\course\Category;
use common\widgets\Tools;
use kartik\editable\Editable;
use yii\helpers\Url;

?>

<tr>
    <td>
        <?= $model->id ?>
    </td>
    <td>
        <?= Editable::widget([
            'name' => 'name',
            'asPopover' => false,
            'value' => $model->name,
            'size' => 'sm',
            'submitButton' => [
                'icon' => "<i class='ti ti-check' ></i>",
                'class' => "kv-editable-submit btn btn-sm btn-info",
            ],
            'buttonsTemplate' => "{submit}",
            'options' => ['class' => 'form-control', 'prompt' => 'Category name'],
            'formOptions' => [
                'action' => Url::toRoute(['update-name', 'id' => $model->id])
            ]
        ]) ?>
    </td>
    <td>
        <?= Editable::widget([
            'name' => 'status',
            'asPopover' => false,
            'value' => $model->status,
            'inputType' => Editable::INPUT_DROPDOWN_LIST,
            'data' => Tools::statusList(),
            'size' => 'sm',
            'submitButton' => [
                'icon' => "<i class='ti ti-check' ></i>",
                'class' => "kv-editable-submit btn btn-sm btn-info",
            ],
            'buttonsTemplate' => "{submit}",
            'displayValueConfig' => Tools::statusStyleList(),
            'formOptions' => [
                'action' => Url::toRoute(['update-status', 'id' => $model->id])
            ]
        ]) ?>
    </td>
    <td>
        <?= Tools::dateFormat($model->created_at) ?>
    </td>
</tr>
