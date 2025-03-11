<?php

use common\models\Agent;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model common\models\CreateUserForm */

$this->title = 'Update Agent/Partner Details';
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
                'id' => 'create-agent-form',
            ]); ?>

                <?= $form->field($model, 'code')->textInput(['maxlength' => true])->label("Agent Code") ?>

                <div class="mt-1">&nbsp;</div>

                <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

                <div class="mt-1">&nbsp;</div>

                <?= $form->field($model, 'contact_no')->textInput() ?>

                <div class="mt-1">&nbsp;</div>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <div class="mt-1">&nbsp;</div>

                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                <div class="mt-1">&nbsp;</div>

                <?= $form->field($model, 'type')->dropDownList(["" => "[Select]", Agent::TYPE_PARTNER => Agent::TYPE_PARTNER, Agent::TYPE_ADMIN => Agent::TYPE_ADMIN])?>                

                
                <div class="mt-1">&nbsp;</div>

                <div class="form-group">
                    <?= Html::submitButton('Save Details', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
