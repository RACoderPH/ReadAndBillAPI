<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<!-- <body class="d-flex flex-column h-100">
<?php $this->beginBody() ?> -->

<!-- <header>    
</header> -->



<!-- <div class="container-fluid h-100">
  <div class="row h-100">
    <div class="col-md-2 d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <a href="<?= Yii::$app->homeUrl ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Baliwag WD UMS</span> 
        </a>
        <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                <?= Html::a('Home', ['/site/index'], ['class' => 'nav-link active']) ?>
                </li>
                <li class="nav-item">
                <?= Html::a('Dashboard', ['/site/dashboard'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                <?= Html::a('About', ['/site/about'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                  <?= Html::a('Readings', ['/site/readin'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                <?= Html::a('Mobile Users', ['/site/view'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                <?= Html::a('Contact', ['/site/contact'], ['class' => 'nav-link']) ?>
                </li>
                <?php if (Yii::$app->user->isGuest): ?>
                <li class="nav-item">
                    <?= Html::a('Signup', ['/site/signup'], ['class' => 'nav-link']) ?>
                </li>
                <?php endif; ?>
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
    </div> -->



<main role="main">
    

    <div class="container">
        <!-- <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?> -->
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<!-- <footer class="footer mt-auto py-3 bg-light text-dark">
    <div class="container d-flex justify-content-between align-items-center">
        <p class="mb-0">
            &copy; <?= Html::encode("Baliwag WD API") ?> <?= date('Y') ?>
        </p>
        <p class="mb-0">
            <?= Yii::powered() ?>
        </p>
    </div>
</footer> -->

<?php
// Custom CSS to ensure it sticks to the bottom and looks modern
$this->registerCss("
    html, body {
        height: 100%;
        margin: 0;
    }

    .wrapper {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    .content {
        flex: 1;
    }

    .footer {
        background-color: #f8f9fa;
        color: #6c757d;
        font-weight: bold;
        box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
        padding: 15px 0;
        align-self:bottom;
    }

    .footer p {
        font-size: 14px;
    }

    .footer p.mb-0 {
        line-height: 1.5;
    }

    .footer a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s;
    }

    .footer a:hover {
        text-decoration: underline;
    }
");
?>


<?php $this->endBody() ?>



    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="sidebars.js"></script>
  </body>
</html>
<?php $this->endPage();
