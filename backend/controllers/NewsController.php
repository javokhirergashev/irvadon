<?php

namespace backend\controllers;

use backend\models\StaticFunctions;
use common\models\News;
use common\models\search\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritDoc
     */
//    public function behaviors()
//    {
//        return array_merge(
//            parent::behaviors(),
//            [
//                'verbs' => [
//                    'class' => VerbFilter::className(),
//                    'actions' => [
//                        'delete' => ['POST'],
//                    ],
//                ],
//            ]
//        );
//    }

    /**
     * Lists all News models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new News();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->title = json_encode($model->translate_title, JSON_UNESCAPED_SLASHES);
                $model->description = json_encode($model->translate_description, JSON_UNESCAPED_SLASHES);
                $model->body = json_encode($model->translate_body, JSON_UNESCAPED_SLASHES);
                if ($model->save()) {
                    $model->image = UploadedFile::getInstance($model, 'image');
                    $model->image = StaticFunctions::saveImage('news', $model->id, $model->image);
                    $model->save();
                    return $this->redirect(['index']);
                } else {
                    print_r($model->errors);
                    die;
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;
        $titleValues = json_decode($model->title, true);
        $descriptionValues = json_decode($model->description, true);
        $bodyValues = json_decode($model->body, true);
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->title = json_encode($model->translate_title, JSON_UNESCAPED_SLASHES);
            $model->description = json_encode($model->translate_description, JSON_UNESCAPED_SLASHES);
            $model->body = json_encode($model->translate_body, JSON_UNESCAPED_SLASHES);
            $model->image = UploadedFile::getInstance($model, 'image');
            if (!empty($model->image)) {
                StaticFunctions::deleteImage('service', $model, $oldImage);
                $model->image = StaticFunctions::saveImage('news', $model->id, $model->image);
            } else {
                $model->image = $oldImage;
            }

            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                echo "<pre>";
                print_r($model->errors);
                die;
            }
        }

        return $this->render('update', [
            'model' => $model,
            'titleValues' => $titleValues,
            'descriptionValues' => $descriptionValues,
            'bodyValues' => $bodyValues
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
