<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\Trashed */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Trashed',
]) . ' ' . $model->idtrashed;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trasheds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtrashed, 'url' => ['view', 'id' => $model->idtrashed]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="trashed-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
