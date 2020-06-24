<?php

namespace app\controllers;

use Yii;
use app\models\Pais;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\db\IntegrityException;

/**
 * PaisController implementa as ações de CRUD do modelo 'Pais'
 */
class PaisController extends Controller
{
    /**
     * Lista todos os modelos 'Pais'
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Pais::find(),
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Cria um novo modelo 'Pais'
     * Se criar com sucesso redireciona para a view 'index' com mensagem de sucesso
     */
    public function actionCreate()
    {
        $model = new Pais();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'País criado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Edita um modelo 'Pais' existente
     * Se editar com sucesso redireciona para a view 'index' com mensagem de sucesso
     */
    public function actionUpdate($id)
    {
        $model = Pais::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'País atualizado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Exclui um modelo 'Pais' existente
     * Se excluir com sucesso redireciona para a view 'index' com mensagem de sucesso
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);

        try {
            $model->delete();
            Yii::$app->session->setFlash('success', 'País removido com sucesso');
            return $this->redirect(['index']);
        } catch (IntegrityException $e) {
            Yii::$app->session->setFlash('warning', 'Não foi possível excluir este país. Verifique se há estados vinculados antes de excluí-lo.');
            return $this->redirect(['index']);
        }
    }

    /**
     * Procura um modelo Imovel de acordo com o id informado.
     * Se o modelo não for encontrado exibe uma mensagem de erro na tela.
     * @param integer $id
     * @return Pais the loaded model
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = Pais::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }
}
