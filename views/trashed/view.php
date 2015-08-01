<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\Trashed */

$this->title = $model->idtrashed;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trasheds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trashed-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idtrashed], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idtrashed], [
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
            'idtrashed',
            'id',
            'tablename',
            'created',
        ],
    ]) ?>

</div>
