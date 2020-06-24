<?php

use yii\grid\GridView;
use yii\helpers\Html;
use kartik\icons\Icon;

/** @var $this yii\web\View */
/** @var $dataProvide yii\data\ActiveDataProvider */

$this->title = 'Gerenciar cidades';
$this->params['breadcrumbs'][] = $this->title;

Icon::map($this);
?>

<div>
    <h1><?php echo $this->title; ?></h1>

    <p><?php echo Html::a(Icon::show('plus') . 'Cidade', ['/cidade/create'], ['class' => 'btn btn-primary']); ?></p>

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
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(Icon::show('edit'), ['update', 'id' => $model->id]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id], ['data' => ['confirm' => 'Tem certeza que deseja excluir essa cidade?']]);
                    }
                ],
            ],
        ]
    ]);   ?>
</div>