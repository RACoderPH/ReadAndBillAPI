<?php
use yii\helpers\Html;
/** @var yii\web\View $this */

$this->title = 'Baliwag WD UMS';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baliwag Water District</title>
    <link rel="icon" href="<?= Yii::getAlias('@web/images/BWDLOGO.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f4f6f9;
            color: #333;
        }

        /* Sidebar Styling */
        nav {
            background: linear-gradient(135deg, #004085 0%, #002752 100%);
            color: white;
            width: 220px;
            min-height: 100vh;
            padding: 20px;
            position: fixed;
            left: 0;
            transition: all 0.3s ease;
            box-shadow: 4px 0 12px rgba(0, 0, 0, 0.2);
            z-index: 99;
        }

        nav img {
            width: 80%;
            margin-bottom: 20px;
            border-radius: 12px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 12px;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        nav i {
            margin-right: 10px;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .submenu {
            display: none;
            padding-left: 20px;
        }

        .submenu a {
            font-size: 0.9rem;
            padding: 8px 0;
            color: white;
        }

        .submenu.open {
            display: block;
        }

        /* Content Area */
        .content {
            margin-left: 400px;
            /* Matches the sidebar width */
            padding: 40px;
            display: flex;
            width: 100%;
            /* Flexbox to center content */
            flex-direction: column;
            /* Align items vertically */
            justify-content: center;
            /* Center vertically */
            align-items: center;
            /* Center horizontally */
            height: 100vh;
            /* Full viewport height for vertical centering */
            text-align: center;
        }


        .content h1,
        h2 {
            color: #333;
        }
        .homepage-images {
    display: flex;
    gap: 20px;
    margin-top: 20px;
    flex-wrap: wrap;
    justify-content: center;
}

.image-card {
    width: 300px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    background: #fff;
    overflow: hidden;
    padding: 15px;
}

.image-card p {
    margin-top: 10px;
    font-size: 1rem;
    color: #555;
}

    
    </style>
</head>

<body>

    <!-- Sidebar -->
    <nav id="sidebar">
        <?= Html::img('@web/images/BWDLOGO.png', ['alt' => 'Baliwag Water District Logo']) ?>
        <?= Html::a('<i class="fas fa-home"></i> Home', ['/site/index']) ?>
        <?= Html::a('<i class="fas fa-tachometer-alt"></i> Dashboard', ['/site/dashboard']) ?>
        <?= Html::a('<i class="fas fa-tint"></i> Readings', ['/site/view.php']) ?>
        <?= Html::a('<i class="fas fa-users"></i> Mobile Users', ['/site/view']) ?>
        <?= Html::a('<i class="fas fa-info-circle"></i> About', ['/site/about']) ?>

        <hr>

        <!-- Login/Logout Logic -->
        <?php if (Yii::$app->user->isGuest): ?>
            <?= Html::a('<i class="fas fa-sign-in-alt"></i> Login', ['/site/login'], ['class' => 'btn btn-link text-decoration-none text-white']) ?>
        <?php else: ?>
            <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex']) ?>
            <?= Html::submitButton(
                '<i class="fas fa-sign-out-alt"></i> Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link text-decoration-none text-white']
            ) ?>
            <?= Html::endForm() ?>
        <?php endif; ?>

        <?= Html::tag('i', '', ['class' => 'fas fa-info-circle']) . ' Version' ?>

    </nav>

    <!-- Content -->
    <div class="content">
    <div class="logo">
        <?= Html::img('@web/images/BWDLOGO.png', ['alt' => 'BaliwagWD Logo', 'style' => 'width: 150px;']) ?>
    </div>
    <h1>BALIWAG WATER DISTRICT</h1>
    <h2>METER READING MANAGEMENT SYSTEM</h2>
    <div class="homepage-images">
        <div class="image-card">
            <?= Html::img('@web/images/meter_reading.jpg', ['alt' => 'Meter Reading', 'style' => 'width: 100%; border-radius: 12px;']) ?>
            <p>Efficient and accurate meter reading.</p>
        </div>
        <div class="image-card">
            <?= Html::img('@web/images/customer_service.jpg', ['alt' => 'Customer Service', 'style' => 'width: 100%; border-radius: 12px;']) ?>
            <p>Reliable customer service at your fingertips.</p>
        </div>
        <div class="image-card">
            <?= Html::img('@web/images/water_supply.jpg', ['alt' => 'Water Supply', 'style' => 'width: 100%; border-radius: 12px;']) ?>
            <p>Committed to providing quality water supply.</p>
        </div>
    </div>
</div>


</body>

</html>