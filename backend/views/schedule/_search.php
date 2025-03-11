<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\common\models\ScheduleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="schedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sequence') ?>

    <?= $form->field($model, 'sin') ?>

    <?= $form->field($model, 'account_no') ?>

    <?= $form->field($model, 'account_name') ?>

    <?php // echo $form->field($model, 'account_address') ?>

    <?php // echo $form->field($model, 'account_status') ?>

    <?php // echo $form->field($model, 'meter_no') ?>

    <?php // echo $form->field($model, 'connection_date') ?>

    <?php // echo $form->field($model, 'sr_citizen') ?>

    <?php // echo $form->field($model, 'prev_date') ?>

    <?php // echo $form->field($model, 'prev_reading') ?>

    <?php // echo $form->field($model, 'average_usage') ?>

    <?php // echo $form->field($model, 'wb_arrears') ?>

    <?php // echo $form->field($model, 'sf_arrears') ?>

    <?php // echo $form->field($model, 'advance') ?>

    <?php // echo $form->field($model, 'pn_nc') ?>

    <?php // echo $form->field($model, 'pn_nc_count') ?>

    <?php // echo $form->field($model, 'pn_wb') ?>

    <?php // echo $form->field($model, 'pn_wb_count') ?>

    <?php // echo $form->field($model, 'violation') ?>

    <?php // echo $form->field($model, 'reading_date') ?>

    <?php // echo $form->field($model, 'due_date') ?>

    <?php // echo $form->field($model, 'discon_due_date') ?>

    <?php // echo $form->field($model, 'discon_due_date_with_arrears') ?>

    <?php // echo $form->field($model, 'installation_date') ?>

    <?php // echo $form->field($model, 'old_meter_usage') ?>

    <?php // echo $form->field($model, 'old_meter_prev_reading') ?>

    <?php // echo $form->field($model, 'old_meter_pres_reading') ?>

    <?php // echo $form->field($model, 'ff_code') ?>

    <?php // echo $form->field($model, 'prev_remarks') ?>

    <?php // echo $form->field($model, 'announcement') ?>

    <?php // echo $form->field($model, 'meter_reader') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
