<?php

namespace api\controllers;

use common\models\UnscheduledPhoto;
use app\common\models\UnscheduledPhotoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii;

/**
 * UnscheduledPhotoController implements the CRUD actions for UnscheduledPhoto model.
 */
class UnscheduledPhotoController extends RestBaseController
{
    public $modelClass = 'common\models\UnscheduledPhoto';

    // GET all records with optional date filter
    public function actionIndex()
    {
        $query = UnscheduledPhoto::find();

        // Check if a date parameter is provided
        $date = Yii::$app->request->get('date');
        if (!empty($date)) {
            $query->where(['reading_date' => Yii::$app->formatter->asDate($date, 'yyyy-MM-dd')]);
        }

        return $query->all();
    }

    public function actionView($id)
    {
        // Check if the provided ID is a date string
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $id)) {
            // If it's a date, use findModelsByDate to retrieve multiple records
            $models = $this->findModelsByDate($id);
            return $models;
        } else {
            // If it's an ID, use findModel to retrieve a single record
            $model = $this->findModel($id);
            return $model;
        }
    }

    // POST: Create new record
    public function actionCreate()
    {
        $model = new UnscheduledPhoto();

        if ($model->load(Yii::$app->request->getBodyParams(), '') && $model->save()) {
            Yii::$app->response->statusCode = 201; // HTTP Status Code 201: Created
            return $model;
        } else {
            Yii::$app->response->statusCode = 400; // HTTP Status Code 400: Bad Request
            return $model->getErrors();
        }
    }

    // PATCH/PUT: Update an existing record
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->getBodyParams(), '') && $model->save()) {
            return $model;
        } else {
            Yii::$app->response->statusCode = 400; // HTTP Status Code 400: Bad Request
            return $model->getErrors();
        }
    }

    // DELETE: Delete an existing record
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->delete() !== false) {
            Yii::$app->response->statusCode = 204; // HTTP Status Code 204: No Content
            return ['message' => 'Deleted successfully'];
        } else {
            Yii::$app->response->statusCode = 400; // HTTP Status Code 400: Bad Request
            return ['message' => 'Error in deletion'];
        }
    }

    protected function findModel($id)
    {
        // Attempt to find the Schedule model by ID
        $model = UnscheduledPhoto::find()->where(['id' => $id])->one();

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested Reading photo record does not exist.');
        }
    }

    protected function findModelsByDate($date)
    {
        // Attempt to find Schedule models by date
        $model = UnscheduledPhoto::find()->where(['reading_date' => $date])->all();

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested reading date photo records do not exist.');
        }
    }
}
