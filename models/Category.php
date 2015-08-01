<?php

namespace vendor\kabira\tookee\models;

use Yii;

/**
 * This is the model class for table "tookee_category".
 *
 * @property integer $idcategory
 * @property string $title
 * @property string $created
 * @property string $modified
 * @property integer $published
 * @property integer $trashed
 * @property integer $owner
 *
 * @property User $owner0
 * @property TookeeNews[] $tookeeNews
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tookee_category';
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created', 'modified'], 'safe'],
            [['published', 'trashed', 'owner'], 'integer'],
            [['title'], 'string', 'max' => 510]
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
            'idcategory' => Yii::t('app', 'Idcategory'),
            'title' => Yii::t('app', 'Title'),
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
    public function getTookeeNews()
    {
        return $this->hasMany(TookeeNews::className(), ['idcategory' => 'idcategory']);
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
}
