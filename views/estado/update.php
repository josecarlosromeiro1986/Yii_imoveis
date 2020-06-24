<?php

use yii\helpers\Html;

/** @var $this yii\web\View */
/** @var $model app\models\Estado */

$this->title = 'Editar estados';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar estados', 'url' => ['/estado/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?php echo $this->title; ?></h1>
    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>
</div>