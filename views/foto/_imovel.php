<?php

/** @var $this yii\web\View */
/** @var $imovel app\models\Imovel */
?>

<div class="panel panel-default">
    <div class="panel-heading">Informações do imóvel</div>
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