<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

/**@var $imovel app\models\Imovel */


$this->title = 'Gerenciar características do imóvel';
$this->params['breadcrumbs'][] = $this->title;

Icon::map($this);
?>
<div class="imovel-caracteristica-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Icon::show('arrow-left') . ' Voltar', ['/imovel/index'], ['class' => 'btn btn-danger']) ?>
        <?php echo Html::a(Icon::show('plus') . ' Característica', ['create', 'id_imovel' => Yii::$app->request->get('id_imovel')], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="row">
        <div class="col-md-8">
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{items}\n{pager}",
                'columns' => [
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['class' => 'col-md-1 text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                    [
                        'attribute' => 'id_caracteristica',
                        'value' => 'caracteristica.descricao',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'headerOptions' => ['class' => 'col-md-1 text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'delete' => function ($url, $model) {
                                return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id, 'id_imovel' => $model->id_imovel], ['title' => 'Excluir', 'data' => ['confirm' => 'Confirma a exclusão desta característica?']]);
                            },
                            'update' => function ($url, $model) {
                                return Html::a(Icon::show('edit'), ['update', 'id' => $model->id, 'id_imovel' => $model->id_imovel]);
                            }
                        ],
                    ],
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
            <?php echo $this->render('_imovel', [
                'imovel' => $imovel,
            ]); ?>
        </div>
    </div>
</div>