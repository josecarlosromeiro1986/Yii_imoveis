<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gerenciar Cidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <h1><?php echo $this->title; ?></h1>

    <p>
        <?php echo Html::a('+ Cidade', ['/cidade/create'], ['class' => 'btn btn-primary']); ?>
    </p>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            
            [
                'attribute' => 'estado.id_pais',
                'value' => 'estado.pais.nome',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            
            [
                'attribute' => 'id_estado',
                'value' => 'estado.nome',
                'headerOptions' => ['class' => 'col-md-2'],
            ],

            [
                'attribute' => 'nome',
            ],

            [
                'attribute' => 'lat',
                'headerOptions' => ['class' => 'col-md-2 text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],

            [
                'attribute' => 'lng',
                'headerOptions' => ['class' => 'col-md-2 text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>