<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ViewReading $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'View Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="view-reading-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
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
            'ID',
            'sin',
            'account:ntext',
            'cname:ntext',
            'status:ntext',
            'meter_no:ntext',
            'PREVRDG',
            'PRESRDG',
            'reading_date',
            'USAGE',
            'ffcode',
            'mcode',
            'remarks',
            'mreader',
            'amount',
            'is_average',
            'consumption_status',
        ],
    ]) ?>

</div>
