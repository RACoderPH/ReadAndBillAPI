<?php

namespace backend\controllers;

use common\components\AppDownloadCsv;
use common\models\Agent;
use common\models\AgentSearch;
use common\models\User;
use Yii;
use yii\base\DynamicModel;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AgentController extends Controller
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
        $searchModel = new AgentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $download_attributes = [];
        $download_model = new Agent();
        foreach ($download_model->attributes as $attribute => $value) {
            $download_attributes[$attribute] = $attribute;
        }        
        $download_csv = new AppDownloadCsv([
            "data_provider" => $dataProvider,
            "columns" => $download_attributes,
            "filename" => "agents.csv"
        ]);
        $download_csv->watch();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    public function actionCreate(){
        $model = new Agent();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Agent/Partner account added successfully.');
                return $this->redirect(['index']);
            } else {            
                Yii::$app->session->setFlash('error', "<b>Error in input values:</b><br>" . implode("<br>", array_values($model->getErrorSummary(false))));
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id){
        $model = $this->findModel($id);
    
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Agent/Partner details updated successfully.');                
            } else {            
                Yii::$app->session->setFlash('error', "<b>Error in input values:</b><br>" . implode("<br>", array_values($model->getErrorSummary(false))));
            }
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }


    
    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionRevealApiKey($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = $this->findModel($id);
        return $model->getApi_key();
    }



   
    protected function findModel($id)
    {
        if (($model = Agent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}