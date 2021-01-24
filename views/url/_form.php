<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Url */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="url-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'expired')->widget(\kartik\datetime\DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Пример: '.date('Y-m-d H:i',time()+3600)],
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Преобразовать'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
