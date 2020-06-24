<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/** @var $this yii\web\View */
/** @var $model app\models\Caracteristica */
/** @var $form yii\widgets\ActiveForm */

Icon::map($this);
?>

<div>
    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'descricao')->textInput(['maxlength' => true]); ?>

    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . 'Salvar', ['class' => 'btn btn-success']); ?>
        <?php echo Html::a(Icon::show('times') . 'Cancelar', ['/caracteristica/index'], ['class' => 'btn btn-danger']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>