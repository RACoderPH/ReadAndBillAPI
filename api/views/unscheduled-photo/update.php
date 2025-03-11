<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\UnscheduledPhoto $model */

$this->title = 'Update Unscheduled Photo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Unscheduled Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unscheduled-photo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
