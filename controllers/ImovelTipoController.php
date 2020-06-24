<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\ImovelTipo;
use yii\db\IntegrityException;

/**
 * Classe ImovelTipoController implementa as ações de CRUD para o modelo ImovelTipo
 */
class ImovelTipoController extends Controller
{
    /**
     * Ação para exibir a view 'index'
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
     * Ação para criar um modelo ImovelTipo
     * Se realizar o insert redireciona para a view 'index'
     */
    public function actionCreate()
    {
        $model = new ImovelTipo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Imóvel cadastrado com sucesso.');
            return $this->redirect(['/imovel-tipo/index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Ação para editar um modelo ImovelTipo existente
     * Se realizar o update redireciona para a view 'index'
     * 
     * @param integer $id 
     */
    public function actionUpdate($id)
    {
        $model = ImovelTipo::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Imóvel alterado com sucesso.');
            return $this->redirect(['/imovel-tipo/index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Ação para excluir um modelo ImovelTipo existente
     * Se realizar a exclusão redireciona para a view 'index'
     * 
     * @param integer $id
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);

        try {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Tipo de imóvel removido com sucesso.');
            return $this->redirect(['index']);
        } catch (IntegrityException $e) {
            Yii::$app->session->setFlash('warning', 'Não foi possível excluir este tipo de imóvel. Verifique se há imóveis cadastrados antes de excluí-lo');
            return $this->redirect(['index']);
        }
    }

    /**
     * Procura um modelo Imovel de acordo com o id informado.
     * Se o modelo não for encontrado exibe uma mensagem de erro na tela.
     * @param integer $id
     * @return ImovelTipo modelo
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = ImovelTipo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }
}
