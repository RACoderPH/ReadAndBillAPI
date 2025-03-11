<?php

namespace backend\controllers;

use common\components\AppDownloadCsv;
use common\models\Account;
use common\models\AccountSearch;
use common\models\ReadingDataSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AccountController extends Controller
{
   
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // '@' symbol represents authenticated users
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new AccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $download_attributes = [];
        $download_model = new Account;
        foreach ($download_model->attributes as $attribute => $value) {
            $download_attributes[$attribute] = $attribute;
        }        
        $download_csv = new AppDownloadCsv([
            "data_provider" => $dataProvider,
            "columns" => $download_attributes,
            "filename" => "accounts.csv"
        ]);
        $download_csv->watch();

        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

   
    public function actionUpdate($id){
        $model = $this->findModel($id);
    
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Customer details updated successfully.');                
            } else {            
                Yii::$app->session->setFlash('error', "<b>Error in input values:</b><br>" . implode("<br>", array_values($model->getErrorSummary(false))));
            }
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }


    
    
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionReadingData($id)
    {        
        $model = $this->findModel($id);
        
        $searchModel = new ReadingDataSearch();
        $searchModel->account_id = $model->id; // Set the account_id attribute to the specified $id        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Render the 'readingData' view with the $model and $dataProvider
        return $this->render('reading-data', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    
   
    protected function findModel($id)
    {
        if (($model = Account::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}