<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Caracteristica;
use yii\db\IntegrityException;

/**
 * Classe CaracteristicaController implementa as ações de CRUD para o modelo Caracteristica
 */
class CaracteristicaController extends Controller
{
    /**
     * Ação para exibir a view 'index'
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
     * Ação para criar um modelo Caracteristica
     * Se realizar o insert redireciona para a view 'index' com mensagem de sucesso.
     */
    public function actionCreate()
    {
        $model = new Caracteristica();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Caracteritica registrada com sucesso.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Ação para editar um modelo Caracteristica existente
     * Se realizar o update redireciona para a view 'index', com mensagem de sucesso.
     * 
     * @param integer $id 
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Caracteritica alterada com sucesso.');
            return $this->redirect(['/caracteristica/index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Ação para excluir um modelo Caracteristica existente
     * Se realizar a exclusão redireciona para a view 'index', com mensagem de sucesso.
     * 
     * @param integer $id
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);

        try {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Caracteritica removida com sucesso.');
            return $this->redirect(['/caracteristica/index']);
        } catch (IntegrityException $e) {
            Yii::$app->session->setFLash('warning', 'Não foi possível excluir essa característica. Verifique se há imóveis vinculados antes de excluir');
            return $this->redirect(['index']);
        }
    }

    /**
     * Procura um modelo Imovel de acordo com o id informado.
     * Se o modelo não for encontrado exibe uma mensagem de erro na tela.
     * @param integer $id
     * @return Caracteristica modelo
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = Caracteristica::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }
}