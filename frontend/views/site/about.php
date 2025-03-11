<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="site-about">

<div class="container-fluid h-100">
  <div class="row h-100">
    <div class="col-md-5 d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <a href="<?= Yii::$app->homeUrl ?>" class="d-flex align-items-left mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg> -->
            <?= Html::img('@web/images/BWDLOGO.png', ['alt' => 'BaliwagWD Logo','width' => 40,'height' => 40]) ?>
            <span class="fs-4">BaliwagWD UMS</span> 
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
                <?= Html::a('About', ['/site/about'], ['class' => 'nav-link active']) ?>
                </li>
                <!-- <li class="nav-item">
                <?= Html::a('Contact', ['/site/contact'], ['class' => 'nav-link']) ?>
                </li> -->
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
    <div class="col-md-5 d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 950px;">
        <!-- <main role="main" class="flex-shrink-0 ms-auto"> -->
            

            <div class="container">


                <h1 class="text-start"><?= Html::encode($this->title) ?></h1>  
                <hr>
                
                <p class="text-start">This is the About page. You may modify the following file to customize its content:</p>  <code><?= __FILE__ ?></code>
        </div>
        </main>
    </div>
