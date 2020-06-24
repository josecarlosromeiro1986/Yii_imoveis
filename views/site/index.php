<?php

use yii\helpers\Html;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\overlays\InfoWindow;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $imoveis app\models\Imovel */

$coordPrincipal = new LatLng(['lat' => -23.3166798, 'lng' => -51.4038733]);
$mapa = new Map([
    'center' => $coordPrincipal,
    'zoom' => 2,
    'width' => '100%',
    'height' => '500',
]);

foreach ($imoveis as $k => $imovel) {
    $marcador = new Marker([
        'position' => new LatLng(['lat' => $imovel->lat, 'lng' => $imovel->lng]),
        'title' => $imovel->descricao,
    ]);

    $marcador->attachInfoWindow(new InfoWindow([
        'content' => '<strong>' . $imovel->descricao . '</strong><br />' . Html::a('Mais informações sobre este imóvel', ['informacoes-imovel', 'id' => $imovel->id]),
    ]));

    $mapa->addOverlay($marcador);
}

$this->title = 'Página inicial';
Icon::map($this);
?>
<div class="site-index">
    <?php if (!Yii::$app->user->isGuest) : ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Imóveis do sistema</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-3 text-center"><span style="font-size: 36 px"><?php echo $contaImoveis ?></span></div>
                                <div class="col-xs-9">
                                    Imóveis registrados.
                                    <p><?php echo html::a(Icon::show('home') . 'Gerenciar imóveis', ['/imovel/index'], ['class' => 'btn btn-primary btn-block']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Características do sistema</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-3 text-center"><span style="font-size: 36 px"><?php echo $contaCaracteristicas ?></span></div>
                                <div class="col-xs-9">
                                    Características registradas.
                                    <p><?php echo html::a(Icon::show('cogs') . 'Gerenciar características', ['/caracteristica/index'], ['class' => 'btn btn-primary btn-block']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Tipos de imóveis do sistema</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-3 text-center"><span style="font-size: 36 px"><?php echo $contaTipos ?></span></div>
                                <div class="col-xs-9">
                                    Tipos de imóveis registrados.
                                    <p><?php echo html::a(Icon::show('clipboard-list') . 'Gerenciar tipos de imóveis', ['/imovel-tipo/index'], ['class' => 'btn btn-primary btn-block']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Imóveis</div>
                    <div class="panel-body"><?php echo $mapa->display(); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>