<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
// Updated CSS for a simple white background and blue elements
$this->registerCss("
    body {
        background: #ffffff;
        color: #343a40;
        font-family: 'Poppins', sans-serif;
    }

    .login-container {
        background: #ffffff;
        border: 1px solid #007bff;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1.2s ease-in-out;
    }

    .login-header {
        text-align: center;
        font-weight: bold;
        margin-bottom: 20px;
        color: #007bff;
        font-size: 1.5rem;
    }

    .login-header .icon {
        font-size: 3rem;
        color: #007bff;
    }

    .login-form .form-control {
        border-radius: 10px;
        border: 1px solid #007bff;
        box-shadow: none;
        transition: all 0.3s ease;
    }

    .login-form .form-control:focus {
        border-color: #0056b3;
        box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.2);
    }

    .login-btn {
        border-radius: 10px;
        font-weight: bold;
        padding: 10px 15px;
        background: #007bff;
        color: #ffffff;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .login-btn:hover {
        background: #0056b3;
        transform: translateY(-3px);
    }

    .login-link {
        color: #007bff;
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .login-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
");
?>

<div class="d-flex justify-content-center align-items-center">
    <div class="col-lg-7">
        <div class="login-container">
            <div class="login-header">
                <div class="icon mb-3">
                    <i class="bi bi-person-circle"></i>
                </div>
                <?= Html::encode($this->title) ?>
            </div>
            <p class="text-center">Welcome back! Please log in to continue.</p>

            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'login-form']]); ?>

                <?= $form->field($model, 'username', [
                    'inputOptions' => ['class' => 'form-control', 'autofocus' => true, 'placeholder' => 'Enter your username'],
                    'labelOptions' => ['class' => 'form-label']
                ]) ?>

                <?= $form->field($model, 'password', [
                    'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Enter your password'],
                    'labelOptions' => ['class' => 'form-label']
                ])->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'class' => 'form-check-input',
                    'template' => "<div class='form-check'>{input} {label}</div>"
                ]) ?>

                <div class="text-center mt-4">
                    <?= Html::submitButton('Login', ['class' => 'btn login-btn w-100', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

            <div class="text-center mt-3">
                <a href="#" class="login-link">Forgot your password?</a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
    </div>
</div>
