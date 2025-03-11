<?php

namespace api\controllers;

use common\models\Agent;
use common\models\Payment;
use common\models\PaymentForm;
use Yii;

use yii\web\NotFoundHttpException;

class PaymentController extends RestBaseController
{
    public $modelClass = 'common\models\Payment';

    //Set the methods that are allowed for certain agent types
    public function behaviors(){
        $behaviors = parent::behaviors();
        
        $behaviors['access']['rules'][] = [
            'allow' => true,
            'actions' => ['view', 'create'],
            'matchCallback' => function ($rule, $action) {
                return $this->authenticated_agent->type === Agent::TYPE_PARTNER;
            }
        ];

        return $behaviors;
    }

   
    //GET all records
    public function actionIndex(){
        return Payment::find()->all();
    }

    //GET one record
    public function actionView($id){ // Note: $id represents the Ref#
        return $this->findModel($id);
    }
  

    public function actionCreate(){
        $paymentForm = new PaymentForm();
    
        if ($paymentForm->load(Yii::$app->getRequest()->getBodyParams(), '') 
            && 
            $payment = $paymentForm->processPayment($this->authenticated_agent)
        ){
            Yii::$app->response->statusCode = 201; // HTTP Status Code 201: Created
            return $payment;
        } else {
            Yii::$app->response->statusCode = 400; // HTTP Status Code 400: Bad Request
            return $paymentForm->getErrors();
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
    protected function findModel($reference_code){
        //Attempt to find the payment model
        $model = Payment::find()->where(['reference' => $reference_code])->one();
    
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested payment record does not exist.');
        }
    }
   

    // Disable inherited actions to implement our own code
    public function actions(){
        $actions = parent::actions();        
        unset($actions['index'], $actions['view'], $actions['create'], $actions['update'], $actions['delete'], );

        return $actions;
    }
}
