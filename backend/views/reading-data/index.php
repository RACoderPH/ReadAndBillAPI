<?php

use common\widgets\DownloadCsvButton;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Reading";
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
                <?= $form->field($searchModel, 'account_no')->textInput(['placeholder' => 'Account No.'])->label(false)?>
            </div>
            <div class="col-md-3">
                <?= $form->field($searchModel, 'previous_date')->input('date',[])->label(false) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($searchModel, 'total_arrears')->input('number',['placeholder' => 'Total Arrears'])->label(false) ?>
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

            'account_no',
            'previous_date',
            'previous_reading',
            'average_usage',
            'advance_payment',
            'wb_arrears',
            'sf_arrears',
            'total_arrears',

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
