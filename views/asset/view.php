<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\Asset */

$this->title = $model->idasset;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Assets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idasset], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idasset], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idasset',
            'assetname',
            'created',
            'trashed',
        ],
    ]) ?>

</div>
