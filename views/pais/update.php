<?php

use yii\helpers\Html;

/** @var $this yii\web\View */
/** @var $model app\models\Pais */

$this->title = 'Editar país';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar países', 'url' => ['/pais/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?php echo $this->title; ?></h1>
    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>
</div>