<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pais;

/**
 * @var $this yii\web\View
 * @var $model app\models\Estado
 * @var $form yii\widgets\ActiveForm
 */
?>
<div>
    <?php $form = ActiveForm::begin(); ?>

    <?php $paises = ArrayHelper::map(Pais::find()->orderBy('nome')->all(), 'id', 'nome');  ?>
    <?php echo $form->field($model, 'id_pais')->dropDownList($paises, ['prompt' => '=== Selecione um País ===']); ?>

    <?php echo $form->field($model, 'nome')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'lat')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'lng')->textInput(['maxlength' => true]); ?>

    <div class="form-group">
        <?php echo Html::submitButton('Salvar', ['class' => 'btn btn-success']); ?>
        <?php echo Html::a('Cancelar', ['/estado/index'], ['class' => 'btn btn-danger']); ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>