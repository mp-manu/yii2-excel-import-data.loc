<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ImportData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="import-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'history_id')->textInput() ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lighting')->textInput() ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'side_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'side')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_accommodation')->textInput() ?>

    <?= $form->field($model, 'nds_accommodation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kvant_accommodation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'impression_per_day')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
