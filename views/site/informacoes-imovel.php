<?php

use yii\helpers\Html;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\Marker;
use himiklab\colorbox\Colorbox;

/* @var $this yii\web\View */
/* @var $imovel app\models\Imovel */

$coordPrincipal = new LatLng(['lat' => $imovel->lat, 'lng' => $imovel->lng]);
$mapa = new Map([
    'center' => $coordPrincipal,
    'zoom' => 5,
    'width' => '100%',
    'height' => '500',
]);

$marcador = new Marker([
    'position' => new LatLng(['lat' => $imovel->lat, 'lng' => $imovel->lng]),
    'title' => $imovel->descricao
]);

$mapa->addOverlay($marcador);

$this->title = 'Informações do Imòvel';
?>
<div class="informacoes-imovel">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Informações do Imóvel</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Dados gerais</div>
                    <div class="panel-body">
                        <dl>
                            <dt>Descrição</dt>
                            <dd><?php echo $imovel->descricao; ?></dd>
                            <dt>Tipo</dt>
                            <dd><?php echo $imovel->tipo->descricao; ?></dd>
                            <dt>Localização</dt>
                            <dd><?php echo $imovel->cidade->nomeFormImovel; ?></dd>
                        </dl>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Características</div>
                    <div class="panel-body">
                        <ul>
                            <?php foreach ($imovel->imovelCaracteristicas as $k => $caracteristica) : ?>
                                <li><?php echo $caracteristica->caracteristica->descricao; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Fotos</div>
                    <div class="panel-body">
                        <?php foreach ($imovel->fotos as $k => $foto) : ?>
                            <?php $img = html::img('@web/fotos/' . $foto->foto, ['height' => '70px']); ?>

                            <?php echo Html::a($img, '@web/fotos/' . $foto->foto, ['class' => 'colorbox']); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Mapa de localização do imóvel</div>
                    <div class="panel-body"><?php echo $mapa->display(); ?></div>
                </div>
            </div>
        </div>
    </div>

    <?php echo Colorbox::widget([
        'targets' => [
            '.colorbox' => [
                'maxWidth' => 600,
                'maxHeight' => 600,
            ]
        ]
    ]); ?>

</div>