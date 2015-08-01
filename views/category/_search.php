<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idcategory') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'created') ?>

    <?= $form->field($model, 'modified') ?>

    <?= $form->field($model, 'published') ?>

    <?php // echo $form->field($model, 'trashed') ?>

    <?php // echo $form->field($model, 'owner') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
