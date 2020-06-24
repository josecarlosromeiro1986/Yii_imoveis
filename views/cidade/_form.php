<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Estado;
use yii\helpers\ArrayHelper;
use app\models\Pais;
use yii\helpers\Url;
use kartik\icons\Icon;

/** @var $this yii\web\View */
/** @var $model app\models\Cidade */
/** @var $form yii\widgets\ActiveForm  */

Icon::map($this);
?>

<div>
    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?php echo Html::label('País', 'pais', ['class' => 'control-label']); ?>
        <?php $paises = ArrayHelper::map(Pais::find()->orderBy('nome')->all(), 'id', 'nome'); ?>

        <?php if ($model->isNewRecord) : ?>
            <?php echo Html::dropDownList('pais', '', $paises, ['class' => 'form-control', 'prompt' => '== Escolha o País ==', 'onchange' => '
                $.get("' . Url::toRoute('/cidade/lista-estados') . '", { id: $(this).val()}).done(function(dados) {
                    $("#' . Html::getInputId($model, 'id_estado') . '").html(dados);
                });
            ']); ?>
        <?php else : ?>
            <?php echo Html::dropDownList('pais', $model->estado->id_pais, $paises, ['class' => 'form-control', 'prompt' => '== Escolha o País ==', 'onchange' => '
                $.get("' . Url::toRoute('/cidade/lista-estados') . '", { id: $(this).val()}).done(function(dados) {
                    $("#' . Html::getInputId($model, 'id_estado') . '").html(dados);
                });
            ']); ?>
        <?php endif; ?>
    </div>

    <?php if ($model->isNewRecord) : ?>
        <?php echo $form->field($model, 'id_estado')->dropDownList(['prompt' => '== Escolha o País ==']); ?>
    <?php else : ?>
        <?php $estados = ArrayHelper::map(Estado::find()->where(['id_pais' => $model->estado->id_pais])->orderBY('nome')->all(), 'id', 'nome'); ?>
        <?php echo $form->field($model, 'id_estado')->dropDownList($estados, ['prompt' => '== Escolha o Estado ==']); ?>
    <?php endif; ?>

    <?php echo $form->field($model, 'nome')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'lat')->textInput(); ?>

    <?php echo $form->field($model, 'lng')->textInput(); ?>

    <div>
        <?php echo Html::submitButton(Icon::show('check') . 'Salvar', ['class' => 'btn btn-success']); ?>
        <?php echo Html::a(Icon::show('times') . 'Cancelar', ['/cidade/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>