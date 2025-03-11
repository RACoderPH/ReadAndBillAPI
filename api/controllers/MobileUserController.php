<?php

namespace api\controllers;

use common\models\MobileUser;
use common\models\MobileUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii;

/**
 * MobileUserController implements the CRUD actions for MobileUser model.
 */
class MobileUserController extends RestBaseController
{
    public $modelClass = 'common\models\MobileUser';

   
    //GET all records
    public function actionIndex(){        
        return MobileUser::find()->all();
    }

    //GET one record
    public function actionView($id){        
        return $this->findModel($id);
    }


    //POST: Create new record
    public function actionCreate(){
        $model = new MobileUser();

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
    protected function findModel($id){
  
         //Attempt to find the MobileUser model
         $model = MobileUser::find()->where(['id' => $id])->one();
    
         if ($model !== null) {
             return $model;
         } else {
             throw new NotFoundHttpException('The requested MobileUser record does not exist.');
         }
    }  
}
