<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cidade */

$this->title = 'Incluir nova cidade';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar cidades', 'url' => ['/cidade/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <h1><?php echo $this->title; ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>
</div>