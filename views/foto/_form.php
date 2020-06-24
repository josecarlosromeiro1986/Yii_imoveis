<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Foto */
/* @var $form yii\widgets\ActiveForm */

Icon::map($this);
?>

<div class="foto-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php echo $form->field($model, 'id_imovel')->hiddenInput()->label(false) ?>

    <?php echo $form->field($model, 'foto')->fileInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . 'Salvar', ['class' => 'btn btn-success']) ?>
        <?php echo Html::a(Icon::show('times') . 'Cancelar', ['index', 'id_imovel' => Yii::$app->request->get('id_imovel')], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>