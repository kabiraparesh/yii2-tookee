<?php

namespace vendor\kabira\tookee\models;

use Yii;

/**
 * This is the model class for table "tookee_asset".
 *
 * @property integer $idasset
 * @property string $assetname
 * @property string $created
 * @property integer $trashed
 */
class Asset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tookee_asset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created'], 'safe'],
            [['trashed'], 'integer'],
            [['assetname'], 'string', 'max' => 1024]
        ];
    }
    
    public function init(){
    	$this->trashed = 0;
    	parent::init();
    }
    
    public function beforeSave($insert)
    {
    	if (parent::beforeSave($insert)) {
    		if($insert){
    			$this->created = new \yii\db\Expression('NOW()');
    		}
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
            'idasset' => Yii::t('app', 'Idasset'),
            'assetname' => Yii::t('app', 'Assetname'),
            'created' => Yii::t('app', 'Created'),
            'trashed' => Yii::t('app', 'Trashed'),
        ];
    }

    /**
     * @inheritdoc
     * @return AssetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssetQuery(get_called_class());
    }
}
