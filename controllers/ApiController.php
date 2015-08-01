<?php

namespace vendor\kabira\tookee\controllers;

use vendor\kabira\tookee\models\Category;

use vendor\kabira\tookee\models\News;

use yii\web\Controller;

class ApiController extends Controller
{
	/*
	 *  Bug in Yii2 When calling from Restful Client.
	*  Unable to verify your data submission exception message in Yii 2
	* 	https://github.com/yiisoft/yii2/issues/5808
	*/
	public $enableCsrfValidation = false;
	
	
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    private function getNews($timestamp){
    
    	$assignedData = array();
    	$updatedData = array();

    	$data = array();
    	$status = array(
    			'code'=>'0',
    			'errorMessage'=>""
    	);
    
    	if($timestamp == 0){
    		$assignedData = News::find()->asArray()->all();
    	}
    	else{
    		$assignedData = News::find()->where('published = 1 And :timestamp < UNIX_TIMESTAMP(created)', [':timestamp' => $timestamp])->asArray()->all();
    		$updatedData  = News::find()->where('published = 1 And ((:timestamp >= UNIX_TIMESTAMP(created) And :timestamp <= UNIX_TIMESTAMP(modified)))', [':timestamp' => $timestamp])->asArray()->all();
    	}
    
    	$data['assignedData'] = $assignedData;
    	$data['updatedData'] = $updatedData;
    
		return ['status'=>$status, 'data'=>$data];
    }

    private function getCategory($timestamp){
    
    	$assignedData = array();
    	$updatedData = array();
    
    	$data = array();
    	$status = array(
    			'code'=>'0',
    			'errorMessage'=>""
    	);
    
    	if($timestamp == 0){
    		$assignedData = Category::find()->asArray()->all();
    	}
    	else{
    		$assignedData = Category::find()->where('published = 1 And :timestamp < UNIX_TIMESTAMP(created)', [':timestamp' => $timestamp])->asArray()->all();
    		$updatedData  = Category::find()->where('published = 1 And ((:timestamp >= UNIX_TIMESTAMP(created) And :timestamp <= UNIX_TIMESTAMP(modified)))', [':timestamp' => $timestamp])->asArray()->all();
    	}
    
    	$data['assignedData'] = $assignedData;
    	$data['updatedData'] = $updatedData;
    
    	return ['status'=>$status, 'data'=>$data];
    }
    
    
    public function actionGetall($timestamp=0){
    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	return [ 
    		'news' => $this->getNews($timestamp),
    		'category' => $this->getCategory($timestamp),
    		'timestamp' => time(),
    	];
    }
}
