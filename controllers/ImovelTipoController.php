<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\ImovelTipo;

/**
 * ImovelTipoController implementa as ações para o CRUD.
 */
class ImovelTipoController extends Controller
{
    /**
     * Lista todos os modelos ImovelTipo.
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ImovelTipo::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Cria um novo modelo ImovelTipo
     * Se criar com sucesso, carrega a view 'index' com mensagem de sucesso
     */
    public function actionCreate()
    {
        $model = new ImovelTipo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Tipo de imóvel criado com sucesso.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Edita um modelo ImovelTipo existente
     * Se editar com sucesso carrega a view 'index' com mensagem de sucesso
     * @param integer $id
     */
    public function actionUpdate($id)
    {
        $model = ImovelTipo::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Tipo de imóvel atualizado com sucesso.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Exclui um modelo ImovelTipo existente.
     * Se excluir com sucesso redireciona para a view 'index' com mensagem de sucesso.
     * @param integer $id
     */
    public function actionDelete($id)
    {
        ImovelTipo::findOne($id)->delete();
        Yii::$app->session->setFlash('success', 'Tipo de imóvel removido com sucesso.');

        return $this->redirect(['index']);
    }

}