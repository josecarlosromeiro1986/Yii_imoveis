<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model app\models\Pais
 * @var $form yii\widgets\ActiveForm;
 */
?>
<div>
    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'nome')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'lat')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'lng')->textInput(['maxlength' => true]); ?>

    <div class="form-group">
        <?php echo Html::submitButton('Salvar', ['class' => 'btn btn-success']); ?>
        <?php echo Html::a('Cancelar', ['/pais/index'], ['class' => 'btn btn-danger']); ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>