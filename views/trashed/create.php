<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\Trashed */

$this->title = Yii::t('app', 'Create Trashed');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trasheds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trashed-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
