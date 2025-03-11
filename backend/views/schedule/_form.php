<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\common\models\schedule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sequence')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_no')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'account_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'account_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'account_status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meter_no')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'connection_date')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sr_citizen')->textInput() ?>

    <?= $form->field($model, 'prev_date')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'prev_reading')->textInput() ?>

    <?= $form->field($model, 'average_usage')->textInput() ?>

    <?= $form->field($model, 'wb_arrears')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sf_arrears')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'advance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pn_nc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pn_nc_count')->textInput() ?>

    <?= $form->field($model, 'pn_wb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pn_wb_count')->textInput() ?>

    <?= $form->field($model, 'violation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reading_date')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'due_date')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'discon_due_date')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'discon_due_date_with_arrears')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'installation_date')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'old_meter_usage')->textInput() ?>

    <?= $form->field($model, 'old_meter_prev_reading')->textInput() ?>

    <?= $form->field($model, 'old_meter_pres_reading')->textInput() ?>

    <?= $form->field($model, 'ff_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'prev_remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'announcement')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meter_reader')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
