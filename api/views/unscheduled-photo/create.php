<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\UnscheduledPhoto $model */

$this->title = 'Create Unscheduled Photo';
$this->params['breadcrumbs'][] = ['label' => 'Unscheduled Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unscheduled-photo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
