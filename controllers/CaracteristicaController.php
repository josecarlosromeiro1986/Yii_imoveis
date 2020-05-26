<?php

namespace app\controllers;

use Yii;
use app\models\Caracteristica;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * CaracteristicaController implementa as ações para o CRUD.
 */
class CaracteristicaController extends Controller
{
    /**
     * Lista todos os modelos Caracteristica.
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Caracteristica::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Cria um novo modelo Caracteristica.
     * Se criar com sucesso, carrega a view 'index' com mensagem de sucesso
     * @param integer $id
     */
    public function actionCreate()
    {
        $model = new Caracteristica();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Característica criada com sucesso.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Edita um modelo Caracteristica existente.
     * Se editar com sucesso, carrega a view 'index' com mensagem de sucesso
     * @param integer $id
     */
    public function actionUpdate($id)
    {
        $model = Caracteristica::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Característica alterada com sucesso.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Exclui um modelo Caracteristica existente.
     * Se excluir com sucesso redireciona para a view 'index' com mensagem de sucesso.
     * @param integer $id
     */
    public function actionDelete($id)
    {
        Caracteristica::findOne($id)->delete();
        Yii::$app->session->setFlash('success', 'Característica removida com sucesso.');

        return $this->redirect(['index']);
    }

}