<?php

namespace app\controllers;

use Yii;
use app\models\Imovel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\IntegrityException;

/**
 * ImovelController implementa as ações de CRUD no modelo Imovel.
 */
class ImovelController extends Controller
{
    /**
     * Ação para exibir a view 'Index'.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Imovel::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Cria um modelo Imóvel.
     * Se criar com sucesso direciona para a view 'Index' com mensagem de sucesso.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Imovel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Imóvel cadastrado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Edita um modelo Imóvel existente.
     * Se editar com sucesso direciona para a view 'Index' com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Imóvel alterado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Exclui um modelo Imóvel existente.
     * Se excluir com sucesso direciona para a view 'Index' com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        try {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Imóvel excluído com sucesso');
            return $this->redirect(['index']);
        } catch (IntegrityException $e) {
            Yii::$app->session->setFlash('warning', 'Não foi possível excluir este imóvel. Verifique se há fotos ou características vinculadas ao imóvel antes de excluí-lo');
            return $this->redirect(['index']);
        }
    }

    /**
     * Procura um modelo Imovel de acordo com o id informado.
     * Se o modelo não for encontrado exibe uma mensagem de erro na tela.
     * @param integer $id
     * @return Imovel the loaded model
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = Imovel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }
}
