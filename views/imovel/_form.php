<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Cidade;
use app\models\ImovelTipo;
use yii\helpers\ArrayHelper;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Imovel */
/* @var $form yii\widgets\ActiveForm */

Icon::map($this);
?>

<div class="imovel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $tipos = ArrayHelper::map(ImovelTipo::find()->orderBy('descricao')->all(), 'id', 'descricao'); ?>
    <?php echo $form->field($model, 'id_tipo')->dropDownList($tipos, ['prompt' => '== Escolha o tipo do imóvel ==']); ?>

    <?php $cidades = ArrayHelper::map(Cidade::find()->joinWith(['estado', 'estado.pais'])->orderBy('pais.nome ASC, estado.nome ASC, nome ASC')->all(), 'id', 'nomeFormImovel'); ?>
    <?php echo $form->field($model, 'id_cidade')->dropDownList($cidades, ['prompt' => '== Escolha a Cidade ==']); ?>

    <?php echo $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'complemento')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . 'Salvar', ['class' => 'btn btn-success']) ?>
        <?php echo Html::a(Icon::show('times') . 'Cancelar', ['index'], ['class' => 'btn btn-danger']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>