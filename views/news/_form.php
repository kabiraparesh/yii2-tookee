<?php

use vendor\kabira\tookee\models\Category;

use yii\helpers\ArrayHelper;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model vendor\kabira\tookee\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
	$categories = Category::find()->orderby('title')->all();
	$categories = ArrayHelper::map($categories, 'idcategory', 'title');
?>

<div class="news-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'matter')->textarea(['rows' => 5]) ?>

	<?= $form->field($model, 'idcategory')
		->dropDownList(
				$categories,
				['prompt' => 'Select Category']
		);
	?>

	<?= $form->field($model, 'imageurl')->widget(pendalf89\filemanager\widgets\FileInput::className(), [
			'buttonTag' => 'button',
			'buttonName' => 'Browse',
			'buttonOptions' => ['class' => 'btn btn-default'],
			'options' => ['class' => 'form-control'],
			// Widget template
			'template' => '<div class="img"><img src="'.$model->imageurl.'"/></div><div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
			// Optional, if set, only this image can be selected by user
			//'thumb' => 'original',
			// Optional, if set, in container will be inserted selected image
			'imageContainer' => '.img',
			// Default to FileInput::DATA_URL. This data will be inserted in input field
			'pasteData' => pendalf89\filemanager\widgets\FileInput::DATA_URL,
			// JavaScript function, which will be called before insert file data to input.
			// Argument data contains file data.
			// data example: [alt: "Ведьма с кошкой", description: "123", url: "/uploads/2014/12/vedma-100x100.jpeg", id: "45"]
			'callbackBeforeInsert' => 'function(e, data) {
        		console.log( data );
    		}',
		])	
	?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
