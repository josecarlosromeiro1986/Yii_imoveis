<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Estado;
use app\models\Pais;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $model app\models\Cidade
 * @var $form yii\widgets\ActiveForm
 */
?>
<div>
    <?php $form = ActiveForm::begin(); ?>

    <div class='form-group'>
        <?php echo Html::label('País', 'pais', ['class' => 'control-label']); ?>
        <?php $paises = ArrayHelper::map(Pais::find()->orderBy('nome')->all(), 'id', 'nome'); ?>
        <?php echo Html::dropDownList('pais', '', $paises, ['class' => 'form-control', 'prompt' => '=== Escolha o País ===', 'onchange' => '
            $.get("' . Url::toRoute('/cidade/lista-estados') . '", { id: $(this).val() }).done(function(dados) {
                $("#' . Html::getInputId($model, 'id_estado') . '").html(dados);
            });
        ']); ?>
    </div>

    <?php if($model->isNewRecord): ?>
        <?php echo $form->field($model, 'id_estado')->dropDownList(['prompt' => '=== Escolha o País ===']); ?>
    <?php else: ?>
        <?php $estados = ArrayHelper::map(Estado::find()->orderBy('nome')->all(), 'id', 'nome');  ?>
        <?php echo $form->field($model, 'id_estado')->dropDownList($estados, ['prompt' => '=== Escolha um Estado ===']); ?>
    <?php endif; ?>
    
    <?php echo $form->field($model, 'nome')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'lat')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'lng')->textInput(['maxlength' => true]); ?>

    <div class="form-group">
        <?php echo Html::submitButton('Salvar', ['class' => 'btn btn-success']); ?>
        <?php echo Html::a('Cancelar', ['/estado/index'], ['class' => 'btn btn-danger']); ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>