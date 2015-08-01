<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\News */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'News',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->idnews]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="news-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
