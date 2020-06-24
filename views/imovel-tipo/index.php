<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/** @var $this yii\web\View */
/** @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Gerenciar tipos de imóveis";
$this->params['breadcrumbs'][] = $this->title;

Icon::map($this);
?>

<div>
    <h1><?php echo $this->title; ?></h1>

    <p><?php echo Html::a(Icon::show('plus') . 'Imóvel', ['/imovel-tipo/create'], ['class' => 'btn btn-primary']) ?></p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'descricao',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id], ['title' => 'Excluir', 'data' => ['confirm' => 'Tem certeza que deseja excluir esse tipo de imóvel?']]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a(Icon::show('edit'), ['update', 'id' => $model->id]);
                    }
                ],
            ],
        ]
    ]); ?>
</div>