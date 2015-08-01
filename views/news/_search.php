<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idnews') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'imageurl') ?>
    
    <?= $form->field($model, 'matter') ?>

    <?= $form->field($model, 'idcategory') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'modified') ?>

    <?php // echo $form->field($model, 'published') ?>

    <?php // echo $form->field($model, 'trashed') ?>

    <?php // echo $form->field($model, 'owner') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
