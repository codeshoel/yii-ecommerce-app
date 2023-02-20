<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\widgets\ActiveForm $form */



?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <div class="col-md-3">
        <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-3">
        <?= $form->field($model, 'price')->textInput([
            'maxlength' => true,
            'type' => 'number'
        ]) ?>
    </div>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
