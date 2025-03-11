<?php

use common\widgets\DownloadCsvButton;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
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
            'options' => ['class' => 'row g-3'], // Add Bootstrap row class with gutter
        ]); ?>

        <div class="col-md-2">
            <?= $form->field($searchModel, 'filter_sin')->textInput(['placeholder' => 'Search by SIN', 'class' => 'form-control'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($searchModel, 'filter_agent')->textInput(['placeholder' => 'Search by Agent', 'class' => 'form-control'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($searchModel, 'filter_reference')->textInput(['placeholder' => 'Search by Reference', 'class' => 'form-control'])->label(false) ?>
        </div>
        <div class="col-md-3 d-flex align-items-end">
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
                    return $model->billing->account->sin;
                },
            ],

            [
                'header' => 'Billing Period Code',
                'attribute' => 'billing_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->billing->bill_period_code;
                },
            ],

            [
                'header' => 'Billing Period',
                'attribute' => 'billing_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->billing->date_period_from." / ".$model->billing->date_period_to;
                },
            ],

            [
                'header' => 'Agent',
                'attribute' => 'agent_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->agent->company_name;
                },
            ],

            [
                'header' => 'Amount',
                'attribute' => 'amount_paid',
                'format' => 'raw',
                'value' => function ($model) {
                    return "&#8369; ".$model->amount_paid;
                },
            ],

            'reference',
            'date_issued'
            
            
            /* [
                
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
            ], */
        ],
    ]); ?>
</div>
