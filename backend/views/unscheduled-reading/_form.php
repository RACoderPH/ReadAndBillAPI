<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\common\models\UnscheduledReading $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="unscheduled-reading-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meter_no')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reading')->textInput() ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'zone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reading_date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
