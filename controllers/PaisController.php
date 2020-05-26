<?php

namespace app\controllers;

use Yii;
use app\models\Pais;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * PaisController implementa as ações de CRUD no modelo 'Pais'
 */
class PaisController extends Controller {
    /**
     * Lista todos os modelos 'Pais'
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Pais::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Cria um novo modelo 'Pais'
     * Se criar com sucesso redireciona para a view 'index' com mensagem de sucesso
     */
    public function actionCreate() {
        $model = new Pais();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
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
    public function actionUpdate($id) {
        $model = Pais::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->save()) {
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
    public function actionDelete($id) {
        Pais::findOne($id)->delete();
        Yii::$app->session->setFlash('success', 'País removido com sucesso');
        return $this->redirect(['index']);
    }
}