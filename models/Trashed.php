<?php

namespace vendor\kabira\tookee\models;

use Yii;

/**
 * This is the model class for table "tookee_trashed".
 *
 * @property integer $idtrashed
 * @property integer $id
 * @property string $tablename
 * @property string $created
 */
class Trashed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tookee_trashed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['created'], 'safe'],
            [['tablename'], 'string', 'max' => 1024]
        ];
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
            'idtrashed' => Yii::t('app', 'Idtrashed'),
            'id' => Yii::t('app', 'ID'),
            'tablename' => Yii::t('app', 'Tablename'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    /**
     * @inheritdoc
     * @return TrashedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TrashedQuery(get_called_class());
    }
}
