<?php

use yii\helpers\Html;

/** @var $this yii\web\View */
/** @var $model app\models\Caracteristica */

$this->title = 'Incluir característica';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar características', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?php echo $this->title; ?></h1>
    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>
</div>