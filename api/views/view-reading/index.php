<?php

use common\models\ViewReading;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ViewReadingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'View Readings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-reading-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create View Reading', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'sin',
            'account:ntext',
            'cname:ntext',
            'status:ntext',
            //'meter_no:ntext',
            //'PREVRDG',
            //'PRESRDG',
            //'reading_date',
            //'USAGE',
            //'ffcode',
            //'mcode',
            //'remarks',
            //'mreader',
            //'amount',
            //'is_average',
            //'consumption_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ViewReading $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
