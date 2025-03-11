<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\common\models\UnscheduledReading $model */

$this->title = 'Create Unscheduled Reading';
$this->params['breadcrumbs'][] = ['label' => 'Unscheduled Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unscheduled-reading-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
