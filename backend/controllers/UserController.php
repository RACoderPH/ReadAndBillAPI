<?php

namespace backend\controllers;

use common\models\User;
use Yii;
use yii\base\DynamicModel;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller
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


    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ],
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    

    public function actionCreate()
    {
        $model = new DynamicModel(["username"=> null, "email"=>null, "password"=>null, "retype_password"=>null]);
        $model->addRule(['username', 'email', 'password', 'retype_password'], 'required');
        $model->addRule('email', 'email');
        $model->addRule('email', 'string', ['max' => 255]);
        $model->addRule('username', 'unique', ['targetClass' => '\common\models\User', 'message' => 'This username has already been taken.']);
        $model->addRule('email', 'unique', ['targetClass' => '\common\models\User', 'message' => 'This email has already been taken.']);        
        $model->addRule(['password', 'retype_password'], 'string', ['min' => 5]);
        $model->addRule('retype_password', 'compare', ['compareAttribute'=>'password', 'message'=>"Passwords don't match"]);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {                
                $user = new User();
                $user->username = $model->username;
                $user->email = $model->email;
                $user->setPassword($model->password);
                $user->generateAuthKey();                
                $user->status = User::STATUS_ACTIVE;
                if ($user->save(false)) {                    
                    Yii::$app->session->setFlash('success', "Admin account added successfully.");
                    return $this->redirect(["index"]);
                } else {
                    Yii::$app->session->setFlash('error', "<b>Error in adding the account:</b><br>" . implode("<br>", array_values($user->getErrorSummary(false))));
                }
            } else {
                Yii::$app->session->setFlash('error', "<b>Error in input values:</b><br>" . implode("<br>", array_values($model->getErrorSummary(false))));
            }
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    

    public function actionUpdatePassword($id = null)
    {
        $id  = $id ? $id :  Yii::$app->user->identity->id;
        $user = $this->findModel($id);        
        $model = new DynamicModel(["new_password" => null, "retype_new_password" => null]);
        $model->addRule(['new_password','retype_new_password'], 'required');        
        $model->addRule(['new_password','retype_new_password'], 'string', ['min' => 5]);
        $model->addRule('new_password', 'compare', ['compareAttribute'=>'retype_new_password', 'message'=>"Passwords don't match"]);


        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $user->setPassword($model->new_password);
                if ($user->save(false)) {
                    Yii::$app->session->setFlash('success', "Password updated successfully.");
                } else {
                    Yii::$app->session->setFlash('error', "<b>Error in updating the password:</b><br>" . implode("<br>", array_values($user->getErrorSummary(false))));
                }
            } else {
                Yii::$app->session->setFlash('error', "<b>Error in input values:</b><br>" . implode("<br>", array_values($model->getErrorSummary(false))));
            }
        }
        return $this->render('update-password', [
            'model' => $model            
        ]);
    }

    
    public function actionDelete($id)
    {
        $current_user_id  = Yii::$app->user->identity->id;
        if($current_user_id == $id){
            Yii::$app->session->setFlash('error', "You can not delete your own account.");
            return $this->redirect(['index']);
        }else{
            die($current_user_id." is not equal to ".$id);
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

   
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}