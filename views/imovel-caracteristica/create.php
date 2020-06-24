<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ImovelCaracteristica */
/* @var $imovel app\models\Imovel */

$this->title = 'Incluir característica do imóvel';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar características do imóvel', 'url' => ['index', 'id_imovel' => Yii::$app->request->get('id_imovel')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imovel-caracteristica-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-8">
            <?php echo $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
        <div class="col-md-4">
            <?php echo $this->render('_imovel', [
                'imovel' => $imovel,
            ]); ?>
        </div>
    </div>
</div>