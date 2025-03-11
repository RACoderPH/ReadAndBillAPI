<?php

use common\widgets\DownloadCsvButton;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <div class='d-flex justify-content-between pt-4 mb-4'>
        <div>
            <h2><?= Html::encode($this->title) ?></h2>
        </div>
        <div>
            <?php echo DownloadCsvButton::widget() ?>
        </div>
    </div>
    
    <div class="my-3">
        
        <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => ['class' => 'row g-3'],
        ]); ?>

            <div class="col-md-3">
                <?= $form->field($searchModel, 'sin')->textInput(['placeholder' => 'Search by SIN'])->label(false) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($searchModel, 'filter_name')->textInput(['placeholder' => 'Search by Name'])->label(false) ?>
            </div>
            <div class="col-md-3">
                <?= Html::submitButton('Search', ['class' => 'btn btn-action me-2']) ?>
                <?= Html::a('Reset', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
            </div>
            
        <?php ActiveForm::end(); ?>
        
    </div>
    <?php PJax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,        
        'layout' => "{items}\n<div class='d-flex justify-content-between'><div class='mt-3'>{summary}</div><div class='mt-3'>{pager}</div></div>",
        'pager' => [
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledPageCssClass' => ['class' => 'page-link'],
            'firstPageLabel' => 'First',
            'lastPageLabel'  => 'Last'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sin',
            'address',
            'service_status_code',            
            [
                'header' => 'FullName',
                'attribute' => 'lastname',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->lastname.", ".$model->firstname." ".$model->middlename."";
                },
            ],
            'phone',
            'email',
            'meter_no',

            [
                
                'header' => 'Actions',
                'content' => function ($model) {
                    return '<div class="dropdown">
                                <button class="btn btn-action dropdown-toggle" type="button" id="actionMenuButton' . $model->id . '" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="actionMenuButton' . $model->id . '">
                                    <li>' . Html::a('View Details', ['view', 'id' => $model->id], ['class' => 'dropdown-item']) . '</li>
                                    <li>' . Html::a('View Reading Data', ['reading-data', 'id' => $model->id], ['class' => 'dropdown-item']) . '</li>
                                    <li>' . Html::a('Update Details', ['update', 'id' => $model->id], ['class' => 'dropdown-item']) . '</li>
                                </ul>
                            </div>';
                },
                'format' => 'raw',
            ],
        ],
    ]); ?>
    <?php PJax::end(); ?>
</div>
