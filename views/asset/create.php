<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\Asset */

$this->title = Yii::t('app', 'Create Asset');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Assets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
