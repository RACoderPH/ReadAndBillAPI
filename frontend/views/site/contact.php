<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid h-100">
  <div class="row h-100">
    <div class="col-md-5 d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <a href="<?= Yii::$app->homeUrl ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg> -->
            <?= Html::img('@web/images/BWDLOGO.png', ['alt' => 'BaliwagWD Logo','width' => 40,'height' => 40]) ?>
            <span class="fs-4">Baliwag WD UMS</span> 
        </a>
        <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                <?= Html::a('Home', ['/site/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                <?= Html::a('Dashboard', ['/site/dashboard'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                <?= Html::a('About', ['/site/about'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                <?= Html::a('Contact', ['/site/contact'], ['class' => 'nav-link active']) ?>
                </li>
                <!-- <?php if (Yii::$app->user->isGuest): ?>
                <li class="nav-item">
                    <?= Html::a('Signup', ['/site/signup'], ['class' => 'nav-link']) ?>
                </li>
                <?php endif; ?> -->
            </ul>
        <hr>
        <?php if (Yii::$app->user->isGuest): ?>
        <?= Html::a('Login', ['/site/login'], ['class' => 'btn btn-link text-decoration-none']) ?>
        <?php else: ?>
            <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex']) ?>
            <?= Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link text-decoration-none']
            ) ?>
            <?= Html::endForm() ?>
        <?php endif; ?>
    </div>
<br>
    <div class="col-md-2 d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 950px;">
        <main role="main" class="flex-shrink-0 ms-auto">
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
