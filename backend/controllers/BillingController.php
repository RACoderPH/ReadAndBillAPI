<?php

namespace backend\controllers;

use common\components\AppDownloadCsv;
use common\models\Billing;
use common\models\BillingSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BillingController extends Controller
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
        $searchModel = new BillingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $download_attributes = [];
        $download_model = new Billing();
        foreach ($download_model->attributes as $attribute => $value) {
            $download_attributes[$attribute] = $attribute;
        }        
        $download_csv = new AppDownloadCsv([
            "data_provider" => $dataProvider,
            "columns" => $download_attributes,
            "filename" => "billings.csv"
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
                Yii::$app->session->setFlash('success', 'Billing updated successfully.');                
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

    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    
   
    protected function findModel($id)
    {
        if (($model = Billing::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}