<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'View Account Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <div class='d-flex justify-content-between pt-4 mb-4'>
        <div>
            <h2><?= Html::encode($this->title) ?></h2>
        </div>
        <div>
            <?= Html::a('Edit Details', ['update', 'id'=>$model->id], ['class' => 'btn btn-action']) ?>
        </div>
    </div>

    <?php
        
        $attributes = [];
        foreach ($model->attributes as $attribute => $value) {
            $attributes[] = $attribute;
        }
        
        //Example customized field
        /* $attributes[] = [
            'attribute' => 'date_connected',
            'format' => 'raw',
            'value' => function($model){
                return date("M d, Y", $model->date_connected);
            }
        ]; */

        echo DetailView::widget([
            'model' => $model,
            'attributes' => array_keys($model->attributes),            
            'template' => '<tr><th class="col-lg-4">{label}</th><td class="col-lg-8">{value}</td></tr>',  // This will apply to all items
        ]);
        
        
        
        
    ?>

</div>
