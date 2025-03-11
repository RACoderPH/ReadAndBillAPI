<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\common\models\ViewReadingSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="view-reading-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'sin') ?>

    <?= $form->field($model, 'account') ?>

    <?= $form->field($model, 'cname') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'meter_no') ?>

    <?php // echo $form->field($model, 'PREVRDG') ?>

    <?php // echo $form->field($model, 'PRESRDG') ?>

    <?php // echo $form->field($model, 'reading_date') ?>

    <?php // echo $form->field($model, 'USAGE') ?>

    <?php // echo $form->field($model, 'ffcode') ?>

    <?php // echo $form->field($model, 'mcode') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'mreader') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'is_average') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
