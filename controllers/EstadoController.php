<?php

namespace app\controllers;

use Yii;
use app\models\Estado;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * EstadoController implementa as ações de CRUD no modelo 'Estado'
 */
class EstadoController extends Controller {
    /**
     * Lista todos os modelos 'Estado'
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Estado::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Cria um modelo 'Estado'
     * Se criar com sucesso redireciona para a view 'index' com mensagem de sucesso.
     */
    public function actionCreate() {
        $model = new Estado();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Estado criado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Edita um modelo 'Estado' existente
     * Se editar com sucesso redireciona para a view 'index' com mensagem de sucesso.
     */
    public function actionUpdate($id) {
        $model = Estado::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Estado atualizado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Exclui um modelo 'Estado' existente
     * Se excluir com sucesso redireciona para a view 'index' com mensagem de sucesso.
     */
    public function actionDelete($id) {
        Estado::findOne($id)->delete();
        Yii::$app->session->setFlash('success', 'Estado removido com sucesso');
        return $this->redirect(['index']);
    }
}