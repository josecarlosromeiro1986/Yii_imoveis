<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Gerenciar estado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?php echo $this->title; ?></h1>
    <p><?php echo Html::a('+ Estado', ['/estado/create'], ['class' => 'btn btn-primary']); ?></p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],

            [
                'attribute' => 'id_pais',
                'value' => 'pais.nome',
                'headerOptions' => ['class' => 'col-md-3'],
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
            ]
        ],
    ]); ?>
</div>