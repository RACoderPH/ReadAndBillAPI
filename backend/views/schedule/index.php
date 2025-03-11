<?php

use common\models\schedule;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\common\models\ScheduleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Schedule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'sequence:ntext',
            'sin',
            'account_no:ntext',
            'account_name:ntext',
            //'email',
            //'soa_type',
            //'account_address:ntext',
            //'account_status:ntext',
            //'meter_no:ntext',
            //'connection_date:ntext',
            //'sr_citizen',
            //'prev_date:ntext',
            //'prev_reading',
            'average_usage',
            'wb_arrears',
            'sf_arrears',
            //'advance',
            //'pn_nc',
            //'pn_nc_count',
            //'pn_wb',
            //'pn_wb_count',
            //'violation',
            'reading_date:ntext',
            'due_date:ntext',
            'discon_due_date:ntext',
            'discon_due_date_with_arrears:ntext',
            //'installation_date:ntext',
            'old_meter_usage',
            //'old_meter_prev_reading',
            //'old_meter_pres_reading',
            //'ff_code:ntext',
            //'prev_remarks:ntext',
            //'announcement:ntext',
            //'meter_reader',
            'status',
            //'created_by',
            //'created_at',
            //'updated_by',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, schedule $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
