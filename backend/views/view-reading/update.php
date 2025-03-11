<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\common\models\ViewReading $model */

$this->title = 'Update View Reading: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'View Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="view-reading-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
