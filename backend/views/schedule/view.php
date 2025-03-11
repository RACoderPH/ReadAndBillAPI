<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\common\models\schedule $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="schedule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sequence:ntext',
            'sin',
            'account_no:ntext',
            'account_name:ntext',
            'account_address:ntext',
            'account_status:ntext',
            'meter_no:ntext',
            'connection_date:ntext',
            'sr_citizen',
            'prev_date:ntext',
            'prev_reading',
            'average_usage',
            'wb_arrears',
            'sf_arrears',
            'advance',
            'pn_nc',
            'pn_nc_count',
            'pn_wb',
            'pn_wb_count',
            'violation',
            'reading_date:ntext',
            'due_date:ntext',
            'discon_due_date:ntext',
            'discon_due_date_with_arrears:ntext',
            'installation_date:ntext',
            'old_meter_usage',
            'old_meter_prev_reading',
            'old_meter_pres_reading',
            'ff_code:ntext',
            'prev_remarks:ntext',
            'announcement:ntext',
            'meter_reader',
            'status',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
    ]) ?>

</div>
