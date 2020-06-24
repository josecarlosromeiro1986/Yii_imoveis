<?php

namespace app\controllers;

use Yii;
use app\models\Cidade;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\Estado;
use yii\db\IntegrityException;

/**
 * CidadeController implementa as ações para o CRUD
 */
class CidadeController extends Controller {
    /**
     * Lista todos os modelos Cidade
    */
    public function actionIndex() {
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
     * Cria um modelo Cidade
     * se criar com sucesso, carrega a view 'index' com mensagem de sucesso
     */
    public function actionCreate() {
        $model = new Cidade();
        
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Cidade criada com sucesso.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Edita um modelo Cidade existente
     * se editar com sucesso, carrega a view 'index' com mensagem de sucesso
     */
    public function actionUpdate($id) {
        $model = Cidade::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Cidade atualizada com sucesso.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Exclui um modelo Cidade existente
     * se excluir com sucesso, carrega a view 'index' com mensagem de sucesso
     */
    public function actionDelete($id) {

        $model = $this->findModel($id);

        try {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Cidade removida com sucesso');
            return $this->redirect(['index']);
        } catch (IntegrityException $e) {
            Yii::$app->session->setFlash('warning', 'Nâo foi possível excluir esta cidade. Verifique se há imóveis vinculados antes de excluí-la');
            return $this->redirect(['index']);
        }
        
        
    }

    /**
     * Localiza o estado de acordo com o parâmetro recebido
     * @param int $id
     */
    public function actionListaEstados($id) {
        $estados = Estado::find()->where(['id_pais' => $id])->orderBy('nome')->all();

        if(count($estados) > 0) {
            echo '<option value="">== Escolha o Estado ==</option>';

            foreach($estados as $estado) {
                echo '<option value="'  . $estado->id .  '">'  . $estado->nome .  '</option>';
            }
        }else {
            echo '<option value="">Nenhum estado encontrado</option>';
        }
    }

     /**
     * Procura um modelo Imovel de acordo com o id informado.
     * Se o modelo não for encontrado exibe uma mensagem de erro na tela.
     * @param integer $id
     * @return Cidade modelo
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = Cidade::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }
}