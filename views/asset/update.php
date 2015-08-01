<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\Asset */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Asset',
]) . ' ' . $model->idasset;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Assets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idasset, 'url' => ['view', 'id' => $model->idasset]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="asset-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
