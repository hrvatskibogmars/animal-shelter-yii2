<?php

namespace backend\controllers;

use Yii;
use DateTime;
use backend\models\Animal;
use backend\models\Species;
use backend\models\Breed;

use backend\models\AnimalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Ramsey\Uuid\Uuid;
use yii\helpers\ArrayHelper;

/**
 * AnimalController implements the CRUD actions for Animal model.
 */
class AnimalController extends Controller
{
    public $layout = 'admin.php';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Animal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnimalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Animal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Animal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Animal();
        $uuid4 = Uuid::uuid4();
        $items=array();
        $specie = ArrayHelper::map(Species::find()->all(), 'id', 'name');
        $breed = ArrayHelper::map(Breed::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->galleryFiles = UploadedFile::getInstances($model, 'galleryFiles');
            if ($model->validate()) {
                $model->image = 'uploads/' . $uuid4->toString() . '.' . $model->file->extension;
                $model->file->saveAs('uploads/' . $uuid4->toString() . '.' . $model->file->extension);
                foreach ($model->galleryFiles as $file) {
                    $uuid4 = Uuid::uuid4();
                    array_push($items, 'uploads/' . $uuid4->toString() . '.' . $file->extension);
                    $file->saveAs('uploads/' .  $uuid4->toString() . '.' . $file->extension);
                }
                $model->gallery=$items;
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'specie' => $specie,
            'breed' => $breed,

        ]);
    }

    /**
     * Updates an existing Animal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update-photo-upload';
        $specie = ArrayHelper::map(Species::find()->all(), 'id', 'name');
        $breed = ArrayHelper::map(Breed::find()->all(), 'id', 'name');

        $model->file = $model->image;
        //$model->galleryFiles = $model->gallery;

        //2018-01-01 00:00:00
        //$date = DateTime::createFromFormat('Y-m-d H:i:s', $model->birthday);
        $model->birthday = $model->birthday->format('d-M-Y');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'specie' => $specie,
                        'breed' => $breed,
                    ]);
        }

        return $this->render('update', [
            'model' => $model,
            'specie' => $specie,
            'breed' => $breed,
        ]);
    }

    /**
     * Deletes an existing Animal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Animal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Animal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Animal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
