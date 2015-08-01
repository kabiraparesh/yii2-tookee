<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\TrashedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trashed-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idtrashed') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tablename') ?>

    <?= $form->field($model, 'created') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
