<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model common\models\CreateUserForm */

$this->title = 'Update Admin User';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>


    <div class="row pt-4 mb-3">
        <div class="col-md-6">
            <h2><?= Html::encode($this->title) ?></h2>
        </div>        
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin([
                'id' => 'create-user-form',
            ]); ?>
                
                <?= $form->field($model, 'new_password')->passwordInput()?>

                <div class="mt-1">&nbsp;</div>

                <?= $form->field($model, 'retype_new_password')->passwordInput() ?>                

                <div class="mt-1">&nbsp;</div>

                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
