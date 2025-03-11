<?php

namespace api\controllers;

use common\models\Account;
use common\models\Agent;
use Yii;
use yii\web\NotFoundHttpException;

class AccountController extends RestBaseController
{
    public $modelClass = 'common\models\Account';

   
    //GET all records
    public function actionIndex(){        
        return Account::find()->all();
    }

    //GET one record
    public function actionView($id){        
        return $this->findModel($id);
    }


    //POST: Create new record
    public function actionCreate(){
        $model = new Account();

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

    
    //Utility method to fetch a record
    protected function findModel($sin){
        // if (($model = Account::findOne($id)) !== null) {
        //     return $model;
        // } else {
        //     throw new NotFoundHttpException('The requested page does not exist.');
        // }

         //Attempt to find the Account model
         $model = Account::find()->where(['sin' => $sin])->one();
    
         if ($model !== null) {
             return $model;
         } else {
             throw new NotFoundHttpException('The requested account record does not exist.');
         }
    }   

}
