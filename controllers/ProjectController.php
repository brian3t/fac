<?php

namespace app\controllers;

use app\models\Project;
use app\models\Template;
use usv\yii2helper\PHPHelper;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

require_once realpath(dirname(__DIR__)) . "/models/constants.php";

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Project::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerMicrosite = new \yii\data\ArrayDataProvider([
            'allModels' => $model->microsites,
        ]);
        $providerPage = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pages,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'gallery' => $model->gallery,
            'providerMicrosite' => $providerMicrosite,
            'providerPage' => $providerPage,
        ]);
    }


    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            //we create project sites folder
            //FUTURE: then create sites-available, enable site, then restart apache
            chdir('../web/sites');
            $norm_url = PHPHelper::dbNormalizeString($model->url);
            mkdir($norm_url);
            chdir($norm_url);
            $template_folder = Template::$TEMPLATE_FOLDER;
            $template_folder_real = realpath($template_folder);
            $norm_url_real = realpath(dirname('.'));
            if (strlen($template_folder_real) > 4) {
                exec("cp -Rp $template_folder_real/* $norm_url_real");
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post_params = Yii::$app->request->post();
        if ($model->loadAll($post_params) && $model->saveAll()) {
            //todob rename folder here

            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        chdir('../web/sites');
        $norm_url = PHPHelper::dbNormalizeString($model->url);
        chdir($norm_url);
        $norm_url_real = realpath(dirname("."));
        if (strlen($norm_url_real) > 4) //we only delete non-system folders!!!
        {
            exec("rm -rf $norm_url_real");
        }
        $model->deleteWithRelated();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for Gallery
     * @return mixed
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     */
    public function actionAddGallery()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Gallery');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formGallery', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for Microsite
     * @return mixed
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     */
    public function actionAddMicrosite()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Microsite');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formMicrosite', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for Page
     * @return mixed
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     */
    public function actionAddPage()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Page');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPage', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
