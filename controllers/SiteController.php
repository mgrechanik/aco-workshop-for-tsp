<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\MainModel;
use app\service\AcoWork;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($id = null)
    {
        $model = new MainModel();
        $service = new AcoWork($model, $id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (Yii::$app->request->post('delete-button')) {
                $model->deleteCurrentFile();
                Yii::$app->session->setFlash('success', Yii::t('app', 'The file has been deleted successfully'));
                return $this->redirect(['site/index']);
            } else {
                $id = $service->processValidModel();
                return $this->redirect(['site/index', 'id' => $id]);
            }
        }
        
        $log = $service->getLog();
        
        return $this->render('index', ['model' => $model, 'log' => $log]);
    }

    /**
     * upload action.
     *
     * @return Response|string
     */
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {                
                if ($model->file->saveAs('@webroot/uploads/' . $model->file->baseName . '.' . $model->file->extension)) {
                    Yii::$app->session->setFlash('success', Yii::t('app', 'New file added successfully'));
                }
                
            }
        }

        return $this->redirect(['site/index']);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionLang($lang)
    {
        $model = new \app\models\LangSwitcher();
        $model->setLang($lang);
        $this->redirect(['site/index']);
    }
}
