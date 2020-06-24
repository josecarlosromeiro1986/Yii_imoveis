<?php

use yii\helpers\Html;

/** @var $this yii\web\View */
/** @var $model app\models\ImovelTipo */

$this->title = 'Incluir tipo de imóvel';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar tipos de imóveis', 'url' => ['/imovel-tipo/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?php echo $this->title; ?></h1>
    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>
</div>