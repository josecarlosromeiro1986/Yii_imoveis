<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Caracteristica;
use yii\helpers\ArrayHelper;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\ImovelCaracteristica */
/* @var $form yii\widgets\ActiveForm */

Icon::map($this);
?>

<div class="imovel-caracteristica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $caracteristicas = ArrayHelper::map(Caracteristica::find()->orderBy('descricao')->all(), 'id', 'descricao'); ?>
    <?php echo $form->field($model, 'id_caracteristica')->dropDownList($caracteristicas, ['prompt' => '=== Escolha a Característica ===']) ?>

    <?php echo $form->field($model, 'id_imovel')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . 'Salvar', ['class' => 'btn btn-success']) ?>
        <?php echo Html::a(Icon::show('times') . 'Cancelar', ['index', 'id_imovel' => Yii::$app->request->get('id_imovel')], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>