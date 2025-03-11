<?php

use common\widgets\DownloadCsvButton;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Billings';
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

        <div class="col-md-2">
            <?= $form->field($searchModel, 'filter_sin')->textInput(['placeholder' => 'Search by SIN'])->label(false) ?>
        </div>
        <div class="col-md-2 d-flex justify-content-start align-items-center">
            <span class="me-1">From:</span>
            <?= $form->field($searchModel, 'date_period_from')->input('date', ['style'=>''])->label(false) ?>
        </div>
        <div class="col-md-2 d-flex justify-content-start align-items-center">
            <span class="me-1">To:</span>
            <?= $form->field($searchModel, 'date_period_to')->input('date', ['style'=>''])->label(false) ?>
        </div>
        <div class="col-md-2 d-flex justify-content-start align-items-center">
            <span class="me-1" style="white-space: nowrap;">Due Date:</span>
            <?= $form->field($searchModel, 'date_payment_due')->input('date', ['style'=>'max-width:120px'])->label(false) ?>
        </div>
            
        <div class="col-md-3">
                <?= Html::submitButton('Search', ['class' => 'btn btn-action me-2']) ?>
                <?= Html::a('Reset', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
        </div>
            
        <?php ActiveForm::end(); ?>
        
    </div>

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

            [
                'header' => 'SIN',
                'attribute' => 'id',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->account->sin;
                },
            ],

            'bill_id',
            'bill_status_code',
            'bill_period_code',
            'date_period_from',
            'date_period_to',
            'date_payment_due',
            'date_discon',
            'water_consumption',
            'amount_billed',
            
            [
                
                'header' => 'Actions',
                'content' => function ($model) {
                    return '<div class="dropdown">
                                <button class="btn btn-action dropdown-toggle" type="button" id="actionMenuButton' . $model->id . '" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="actionMenuButton' . $model->id . '">
                                    <li>' . Html::a('View Details', ['view', 'id' => $model->id], ['class' => 'dropdown-item']) . '</li>
                                    <li>' . Html::a('Update Details', ['update', 'id' => $model->id], ['class' => 'dropdown-item']) . '</li>
                                </ul>
                            </div>';
                },
                'format' => 'raw',
            ],
        ],
    ]); ?>
</div>
