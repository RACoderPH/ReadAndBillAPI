<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\common\models\UnscheduledReading $model */

$this->title = 'Update Unscheduled Reading: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Unscheduled Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unscheduled-reading-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
