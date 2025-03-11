<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\common\models\ViewReading $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="view-reading-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID')->textInput() ?>

    <?= $form->field($model, 'sin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meter_no')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'PREVRDG')->textInput() ?>

    <?= $form->field($model, 'PRESRDG')->textInput() ?>

    <?= $form->field($model, 'reading_date')->textInput() ?>

    <?= $form->field($model, 'USAGE')->textInput() ?>

    <?= $form->field($model, 'ffcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mreader')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'is_average')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
