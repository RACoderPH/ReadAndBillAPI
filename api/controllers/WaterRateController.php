<?php

namespace api\controllers;

use common\models\WaterRate;
use common\models\WaterRateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii;

/**
 * WaterRateController implements the CRUD actions for WaterRate model.
 */
class WaterRateController extends RestBaseController
{
    public $modelClass = 'common\models\WaterRate';


    //GET all records
    public function actionIndex(){        
        return WaterRate::find()->all();
    }

    //GET one record
    public function actionView($id){        
        return $this->findModel($id);
    }


    //POST: Create new record
    public function actionCreate(){
        $model = new WaterRate();

        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
            Yii::$app->response->statusCode = 201; // HTTP Status Code 201: Created
            return $model;
        } else {
            Yii::$app->response->statusCode = 400; // HTTP Status Code 400: Bad Request
            return $model->getErrors();
        }
    }

    //PATCH/PUT: Update an existing record
    public function actionUpdate($id){      
        
       $model = $this->findModel($id);        
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
            return $model;
        } else {
            Yii::$app->response->statusCode = 400; // HTTP Status Code 400: Bad Request
            return $model->getErrors();
        }
    }

    //DELETE: Delete an existing record
    public function actionDelete($id){        
        $model = $this->findModel($id);
        if ($model->delete() !== false) {
            Yii::$app->response->statusCode = 204; // HTTP Status Code 204: No Content
            return ['message' => 'Deleted successfully'];
        } else {
            Yii::$app->response->statusCode = 400; // HTTP Status Code 400: Bad Request
            return ['message' => 'Error in deletion'];
        }
    }
    protected function findModel($id){
  
        //Attempt to find the WaterRate model
        $model = WaterRate::find()->where(['id' => $id])->one();
    
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested Water Rates record does not exist.');
        }
}
}
