<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gerenciar Imóveis';
$this->params['breadcrumbs'][] = $this->title;

Icon::map($this);
?>
<div class="imovel-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Icon::show('plus') . 'Imóvel', ['create'], ['class' => 'btn btn-primary']) ?>
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
                'attribute' => 'id_tipo',
                'value' => 'tipo.descricao',
                'headerOptions' => ['class' => 'col-md-2 text-center'],
            ],
            [
                'attribute' => 'id_cidade',
                'value' => 'cidade.nomeFormImovel',
                'headerOptions' => ['class' => 'col-md-2 text-center'],
            ],
            [
                'attribute' => 'descricao',
                'headerOptions' => ['class' => 'col-md-3 text-center'],
            ],
            [
                'label' => 'Fotos',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model, $key, $index, $column) {
                    return Html::a(Icon::show('camera'), ['/foto/index', 'id_imovel' => $model->id]);
                },
                'format' => 'html',
            ],
            [
                'label' => 'Características',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model, $key, $index, $column) {
                    return Html::a(Icon::show('cogs'), ['/imovel-caracteristica/index', 'id_imovel' => $model->id]);
                },
                'format' => 'html',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(Icon::show('edit'), ['update', 'id' => $model->id], ['title' => 'Editar']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id], ['title' => 'Excluir', 'data' => ['confirm' => 'Tem certeza que deseja excluir esse imóvel?']]);
                    }
                ],
            ],
        ],
    ]); ?>
</div>