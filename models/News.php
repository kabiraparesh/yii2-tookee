<?php

namespace vendor\kabira\tookee\models;

use Yii;

/**
 * This is the model class for table "tookee_news".
 *
 * @property integer $idnews
 * @property string $title
 * @property string $url
 * @property string $imageurl
 * @property string $matter
 * @property integer $idcategory
 * @property string $created
 * @property string $modified
 * @property integer $published
 * @property integer $trashed
 * @property integer $owner
 *
 * @property User $owner0
 * @property TookeeCategory $idcategory0
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tookee_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'matter'], 'required'],
            [['url', 'imageurl', 'matter'], 'string'],
            [['idcategory', 'published', 'trashed', 'owner'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['title'], 'string', 'max' => 510]
        ];
    }
    
    public function behaviors()
    {
    	return [
	    	'mediafile' => [
		    	'class' => \pendalf89\filemanager\behaviors\MediafileBehavior::className(),
		    	'name' => 'post',
		    	'attributes' => [
			    	'imageurl',
		    	],
	    	]
    	];
    }    
    
    public function init(){
    	$this->published = 1;
    	$this->trashed = 0;
    	parent::init();
    }
    
    public function beforeSave($insert)
    {
    	if (parent::beforeSave($insert)) {
    		if($insert){
    			$this->owner = Yii::$app->user->id;
    			$this->created = new \yii\db\Expression('NOW()');
    		}
    		$this->modified = new \yii\db\Expression('NOW()');
    		return true;
    	} else {
    		return false;
    	}
    }
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnews' => Yii::t('app', 'Idnews'),
            'title' => Yii::t('app', 'Title'),
            'url' => Yii::t('app', 'Url'),
            'imageurl' => Yii::t('app', 'Image Url'),
            'matter' => Yii::t('app', 'Matter'),
            'idcategory' => Yii::t('app', 'Category'),
            'created' => Yii::t('app', 'Created'),
            'modified' => Yii::t('app', 'Modified'),
            'published' => Yii::t('app', 'Published'),
            'trashed' => Yii::t('app', 'Trashed'),
            'owner' => Yii::t('app', 'Owner'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner0()
    {
        return $this->hasOne(User::className(), ['id' => 'owner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcategory0()
    {
        return $this->hasOne(Category::className(), ['idcategory' => 'idcategory']);
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
