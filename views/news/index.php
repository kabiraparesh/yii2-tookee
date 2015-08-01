<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel vendor\kabira\tookee\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//             'idnews',
            'title',
//             'url:ntext',
//             'imageurl:ntext',
//             'matter:ntext',
//             'idcategory',
            // 'created',
            'modified:date',
            // 'published',
            // 'trashed',
            // 'owner',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
