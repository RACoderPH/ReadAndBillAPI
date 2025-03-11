<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

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
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?=Url::home()?>">BWD Payment API</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(["/account/index"])?>">Customer Accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(["/reading-schedule/index"])?>">Reading Schedules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(["/billing/index"])?>">Billings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(["/payment/index"])?>">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(["/schedule/index"])?>">Schedule</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Parent Item
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action 1</a></li>
                            <li><a class="dropdown-item" href="#">Action 2</a></li>
                            <li><a class="dropdown-item" href="#">Action 3</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(["/mobile-user/index"])?>">Mobile Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(["/view-reading/index"])?>">Reading</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(["/unscheduled-reading/index"])?>">Unscheduled</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(["/agent/index"])?>">Agents/Partners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(["/user/index"])?>">Admins</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarSettingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome, <?=Yii::$app->user->identity->username ?? "Unknown"?>!<i class="ms-2 fa-solid fa-gear"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarSettingDropdown">
                            <li><a class="dropdown-item" href="<?=Url::to(["/user/update-password", "id" => Yii::$app->user->identity->id])?>">Change Password</a></li>
                            <li><a data-method="POST" class="dropdown-item" href="<?=Url::to(["/site/logout"])?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
</nav>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; BWD Payment API <?= date('Y') ?></p>
        <p class="float-end">&nbsp;</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
