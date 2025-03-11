<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MobileUser $model */

$this->title = 'Update Mobile User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mobile Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mobile-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
