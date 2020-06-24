<?php

namespace app\controllers;

use Yii;
use app\models\Foto;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\db\IntegrityException;
use app\models\Imovel;

/**
 * FotoController implementa o CRUD actions for Foto model.
 */
class FotoController extends Controller
{
    /**
     * Lists todos od modelos foto.
     * @return mixed
     */
    public function actionIndex($id_imovel)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Foto::find()->where(['id_imovel' => $id_imovel]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'imovel' => $this->findImovel($id_imovel),
        ]);
    }

    /**
     * Cria um novo modelo foto.
     * Se criar com sucesso direciona para a view 'index' com mensagem de sucesso.
     * @return mixed
     */
    public function actionCreate($id_imovel)
    {
        $model = new Foto();
        $model->id_imovel = $id_imovel;

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->foto = UploadedFile::getInstance($model, 'foto');

            $pasta = 'fotos/';
            $nomeArquivo = uniqid() . '.' . $model->foto->extension;

            if ($model->foto->saveAs($pasta . $nomeArquivo)) {
                $model->foto = $nomeArquivo;
                $model->save(false);
                Yii::$app->session->setFlash('success', 'Foto adicionada com sucesso');
                return $this->redirect(['index', 'id_imovel' => $id_imovel]);
            } else {
                Yii::$app->session->setFlash('Danger', 'Erro ao salvar imagem');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'imovel' => $this->findImovel($id_imovel),
        ]);
    }

    /**
     * Exclui um modelo foto existente.
     * Se excluir com sucesso direciona para a view 'Index' com mensagem de sucesso.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    public function actionDelete($id, $id_imovel)
    {
        $model = $this->findModel($id);

        try {
            $model->delete();
            unlink('fotos/' . $model->foto);
            Yii::$app->session->setFlash('success', 'Foto excluída com sucesso');
            return $this->redirect(['index', 'id_imovel' => $id_imovel]);
        } catch (IntegrityException $e) {
            Yii::$app->session->setFlash('warning', 'Não foi possível excluir essa foto. Verifique se há imóvel vinculado antes de excluí-la');
            return $this->redirect(['index', 'id_imovel' => $id_imovel]);
        }
    }

    /**
     * Procura um modelo Foto de acordo com o id informado.
     * Se o modelo não for encontrado exibe uma mensagem de erro na tela.
     * @param integer $id
     * @return Foto modelo com a foto
     * @throws NotFoundHttpException se o modelo não for encontrado
     */
    protected function findModel($id)
    {
        if (($model = Foto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página que você procura não existe.');
    }

    /**
     * Busca os dados do modelo imóvel
     * 
     * @param integer $id_imovel
     * @return Imovel modelo com dados do imovel
     */

    protected function findImovel($id_imovel)
    {
        return Imovel::findOne($id_imovel);
    }
}
