<?php

use common\widgets\DownloadCsvButton;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agents/Partners Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <div class='d-flex justify-content-between pt-4 mb-4'>
        <div>
            <h2><?= Html::encode($this->title) ?></h2>
        </div>
        <div>
            <?= Html::a('+ Create New', ['create'], ['class' => 'btn btn-action me-2']) ?>
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
                <?= $form->field($searchModel, 'code')->textInput(['placeholder' => 'Search by Code'])->label(false) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($searchModel, 'company_name')->textInput(['placeholder' => 'Search by Name'])->label(false) ?>
            </div>
            <div class="col-md-3">
                <?= Html::submitButton('Search', ['class' => 'btn btn-action']) ?>
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

            'company_name',
            'code',
            'contact_no',
            'email',
            'address',
            'email',

            [
                'header' => 'Account Type',
                'attribute' => 'type'                
            ],           

            [
                'header' => 'API Key',
                //'contentOptions' => ['style' => 'min-width:300px;'],
                'value' => function ($model) {
                    return '<div class="api-key-panel"><span href="#" class="show-api-key" data-id="'.$model->id.'" style="color:rgb(81,81,81); font-size:.9rem;text-decoration:underline;cursor:pointer;">[Show API Key]</span></div>';
                },
                'format' => 'raw',
            ],


            [
                
                'header' => 'Actions',
                'content' => function ($model) {
                    return '<div class="dropdown">
                                <button class="btn btn-action dropdown-toggle" type="button" id="actionMenuButton' . $model->id . '" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="actionMenuButton' . $model->id . '">
                                    <li>' . Html::a('Update Details', ['update', 'id' => $model->id], ['class' => 'dropdown-item']) . '</li>
                                    <li>' . Html::a('Delete', ['delete', 'id' => $model->id],[
                                        'class' => 'dropdown-item',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this user?',
                                            'method' => 'post',
                                        ],
                                    ]) . '</li>
                                </ul>
                            </div>';
                },
                'format' => 'raw',
            ],
        ],
    ]); 
    
    $url = Url::to(["/agent/reveal-api-key"]); 
    
    $script = <<< JS
    $('.show-api-key').on('click', function() {
        var el = $(this);
        var id = el.attr('data-id');
        $.ajax({
            url: '$url',
            type: 'GET',
            data: { id: id },
            success: function(data) {
                $(el.parent('.api-key-panel')).html('<span>' + data + '</span>');                
            },
            error: function() {
                alert('Failed to fetch API key.');
            }
        });
    });
    JS;
    $this->registerJs($script);

    


    
    ?>
</div>
