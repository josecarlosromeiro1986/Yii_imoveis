<?php

namespace app\controllers;

use Yii;
use app\models\ImovelCaracteristica;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Imovel;

/**
 * ImovelCaracteristicaController implementa o CRUD do modelo ImovelCaracteristica.
 */
class ImovelCaracteristicaController extends Controller
{
    /**
     * Lista todos os modelos ImovelCaracteristica de um imóvel específico.
     * @return mixed
     */
    public function actionIndex($id_imovel)
    {
        $query = ImovelCaracteristica::find();
        $query->andWhere('id_imovel = :id_imovel', [':id_imovel' => $id_imovel]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'imovel' => $this->findImovel($id_imovel),
        ]);
    }

    /**
     * Cria um novo modelo ImovelCaracteristica.
     * Se criar com sucesso direciona para a view 'Index' com mensagem de sucesso.
     * @return mixed
     */
    public function actionCreate($id_imovel)
    {
        $model = new ImovelCaracteristica();
        $model->id_imovel = $id_imovel;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Característica adicionada ao imóvel com sucesso');
            return $this->redirect(['index', 'id_imovel' => $id_imovel]);
        }

        return $this->render('create', [
            'model' => $model,
            'imovel' => $this->findImovel($id_imovel),
        ]);
    }

    /**
     * Edita um modelo ImovelCaracteristica existente.
     * Se editar com sucesso direciona para a view 'Index' com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionUpdate($id, $id_imovel)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Característica alterada com sucesso');
            return $this->redirect(['index', 'id_imovel' => $id_imovel]);
        }

        return $this->render('update', [
            'model' => $model,
            'imovel' => $this->findImovel($id_imovel),
        ]);
    }

    /**
     * Exclui um modelo ImóvelCaracteristica existente.
     * Se excluir com sucesso direciona para a view 'Index' com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionDelete($id, $id_imovel)
    {
        $model = $this->findModel($id);
        $model->delete();
        Yii::$app->session->setFlash('success', 'Característica removida do imóvel com sucesso');
        return $this->redirect(['index', 'id_imovel' => $id_imovel]);
    }

    /**
     * Procura um modelo ImovelCaracteristica com base na chave primária.
     * Se o modelo não for encontrado exibe uma mensagem de erro na tela.
     * @param integer $id
     * @return ImovelCaracteristica modelo
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = ImovelCaracteristica::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }

    /**
     * Busca os dados do modelo imóvel
     * 
     * @param integer $id_imovel
     * @return Imovel modelo com dados do imovel
     */

    protected function findImovel($id_imovel)
    {
        return Imovel::findOne($id_imovel);
    }
}
