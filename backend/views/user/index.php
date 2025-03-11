<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <div class='d-flex justify-content-between pt-4 mb-4'>
        <div>
            <h2><?= Html::encode($this->title) ?></h2>
        </div>
        <div>
            <?= Html::a('+ Create New', ['create'], ['class' => 'btn btn-action']) ?>
        </div>
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

            'id',
            'username',
            'email',         

            [
                
                'header' => 'Actions',
                'content' => function ($model) {
                    return '<div class="dropdown">
                                <button class="btn btn-action dropdown-toggle" type="button" id="actionMenuButton' . $model->id . '" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="actionMenuButton' . $model->id . '">
                                    <li>' . Html::a('Update Password', ['update-password', 'id' => $model->id], ['class' => 'dropdown-item']) . '</li>
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
    ]); ?>
</div>
