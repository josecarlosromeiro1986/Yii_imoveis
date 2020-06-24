<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $imovel app\models\Imovel*/

$this->title = 'Gerenciar fotos do imóvel';
$this->params['breadcrumbs'][] = $this->title;

Icon::map($this);
?>
<div class="foto-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Icon::show('arrow-left') . 'Voltar', ['/imovel/index'], ['class' => 'btn btn-danger']) ?>
        <?php echo Html::a(Icon::show('plus') . 'foto', ['create', 'id_imovel' => Yii::$app->request->get('id_imovel')], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="row">
        <div class="col-md-8">
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{items}\n{pager}",
                'columns' => [
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['class' => 'col-md-1 texte-center'],
                        'contentOptions' => ['class' => 'texte-center'],
                    ],
                    [
                        'attribute' => 'foto',
                        'format' => 'html',
                        'value' => function ($model, $key, $index, $column) {
                            return Html::img('@web/fotos/' . $model->foto, ['weigth' => '300px']);
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'headerOptions' => ['class' => 'col-md-1 text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'template' => '{delete}',
                        'buttons' => [
                            'delete' => function ($url, $model) {
                                return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id, 'id_imovel' => $model->id_imovel], ['data' => ['confirm' => 'Tem certeza que deseja excluir essa foto?']]);
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