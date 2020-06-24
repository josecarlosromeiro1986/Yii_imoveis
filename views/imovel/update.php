<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Imovel */

$this->title = 'Editar imóvel';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar imóveis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imovel-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>