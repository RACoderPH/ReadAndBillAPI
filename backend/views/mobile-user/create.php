<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MobileUser $model */

$this->title = 'Create Mobile User';
$this->params['breadcrumbs'][] = ['label' => 'Mobile Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobile-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
