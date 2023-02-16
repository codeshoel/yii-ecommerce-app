<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>


<!-- Outer Row -->
<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row my-5">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <!-- form begins here -->
                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['class' => 'user']
                            ]); ?>


                            <?= $form->field($model, 'username', 
                                ['inputOptions' => [
                                    'class' => 'form-control form-control-user',
                                    'placeholder' => 'Enter your username'
                                    ]
                                ])->textInput(['type'=> 'text', 'autofocus' => true]) ?>

                            <?= $form->field($model, 'password', 
                                ['inputOptions' => [
                                    'class' => 'form-control form-control-user',
                                    'placeholder' => 'Enter your password'
                                    ]
                                ])->passwordInput() ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>

                            <div class="form-group">
                                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= yii\helpers\Url::to(["/site/forgot-password"]) ?>">Forgot Password?</a>
                            </div>
                        <?php ActiveForm::end(); ?>
                        <!-- end of form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
