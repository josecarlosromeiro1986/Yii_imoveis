<?php

namespace app\controllers;

use Yii;
use app\models\Cidade;
use app\models\Estado;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * CidadeController implementa as ações de CRUD no modelo 'Cidade'
 */
class CidadeController extends Controller
{
    /**
     * Lista todos os modelos 'Cidade'
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Cidade::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Cria um modelo 'Cidade'
     * Se criar com sucesso redireciona para a view 'index' com mensagem de sucesso.
     */
    public function actionCreate()
    {
        $model = new Cidade();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Cidade criado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Edita um modelo 'Cidade' existente
     * Se editar com sucesso redireciona para a view 'index' com mensagem de sucesso.
     */
    public function actionUpdate($id)
    {
        $model = Cidade::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Cidade atualizado com sucesso');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Exclui um modelo 'Cidade' existente
     * Se excluir com sucesso redireciona para a view 'index' com mensagem de sucesso.
     */
    public function actionDelete($id)
    {
        Cidade::findOne($id)->delete();
        Yii::$app->session->setFlash('success', 'Cidade removido com sucesso');
        return $this->redirect(['index']);
    }

    /**
     * Localiza estados de acordo com o parâmetro recebido
     * @param int $id
     */

    public function actionListaEstados($id)
    {
        $estados = Estado::find()->where(['id_pais' => $id])->orderBy('nome')->all();

        if (count($estados) > 0) {
            echo '<option value="">== Escolha o Estado ==</option>';

            foreach ($estados as $estado) {
                echo '<option value="' . $estado->id . '">' . $estado->nome . '</option>';
            }
        } else {
            echo '<option value="">Nenhum estado localizado</option>';
        }
    }
}
