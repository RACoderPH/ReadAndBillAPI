<?php

namespace api\controllers;

use common\models\FieldFinding;
use common\models\FieldFindingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii;

/**
 * FieldFindingController implements the CRUD actions for FieldFinding model.
 */
class FieldFindingController extends RestBaseController
{
    public $modelClass = 'common\models\FieldFinding';


    //GET all records
    public function actionIndex(){        
        return FieldFinding::find()->all();
    }

    //GET one record
    public function actionView($id){        
        return $this->findModel($id);
    }


    //POST: Create new record
    public function actionCreate(){
        $model = new FieldFinding();

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
  
        //Attempt to find the FieldFinding model
        $model = FieldFinding::find()->where(['id' => $id])->one();
    
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested FieldFinding record does not exist.');
        }
}
}
