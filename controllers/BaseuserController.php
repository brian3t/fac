<?php

namespace app\controllers;

use app\models\base\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class BaseuserController extends Controller
{
    public function getViewPath()
    {
        return Yii::getAlias('@app/views/baseuser/baseuser');
    }
    
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'add-social-account', 'add-token'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }
    
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerBand = new \yii\data\ArrayDataProvider([
           'allModels' => $model->bands,
       ]);
       $providerBandComment = new \yii\data\ArrayDataProvider([
           'allModels' => $model->bandComments,
       ]);
       $providerBandFollow = new \yii\data\ArrayDataProvider([
           'allModels' => $model->bandFollows,
       ]);
       $providerBandRate = new \yii\data\ArrayDataProvider([
           'allModels' => $model->bandRates,
       ]);
       $providerEvent = new \yii\data\ArrayDataProvider([
           'allModels' => $model->events,
       ]);
       $providerUserEvent = new \yii\data\ArrayDataProvider([
           'allModels' => $model->userEvents,
       ]);
       $providerVenue = new \yii\data\ArrayDataProvider([
           'allModels' => $model->venues,
	   ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
           'providerBand' => $providerBand,
           'providerBandComment' => $providerBandComment,
           'providerBandFollow' => $providerBandFollow,
           'providerBandRate' => $providerBandRate,
           'providerEvent' => $providerEvent,
           'providerUserEvent' => $providerUserEvent,
           'providerVenue' => $providerVenue,
        ]);
    }
    
    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();
        
        return $this->redirect(['index']);
    }
    
    
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
   /* Action to load a tabular form grid
   * for Band
   * @author Yohanes Candrajaya <moo.tensai@gmail.com>
   * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
   *
   * @return mixed
   */
   public function actionAddBand()
   {
       if (Yii::$app->request->isAjax) {
           $row = Yii::$app->request->post('Band');
           if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
               $row[] = [];
           return $this->renderAjax('_formBand', ['row' => $row]);
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
   }
   
   /**
   * Action to load a tabular form grid
   * for BandComment
   * @author Yohanes Candrajaya <moo.tensai@gmail.com>
   * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
   *
   * @return mixed
   */
   public function actionAddBandComment()
   {
       if (Yii::$app->request->isAjax) {
           $row = Yii::$app->request->post('BandComment');
           if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
               $row[] = [];
           return $this->renderAjax('_formBandComment', ['row' => $row]);
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
   }
   
   /**
   * Action to load a tabular form grid
   * for BandFollow
   * @author Yohanes Candrajaya <moo.tensai@gmail.com>
   * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
   *
   * @return mixed
   */
   public function actionAddBandFollow()
   {
       if (Yii::$app->request->isAjax) {
           $row = Yii::$app->request->post('BandFollow');
           if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
               $row[] = [];
           return $this->renderAjax('_formBandFollow', ['row' => $row]);
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
   }
   
   /**
   * Action to load a tabular form grid
   * for BandRate
   * @author Yohanes Candrajaya <moo.tensai@gmail.com>
   * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
   *
   * @return mixed
   */
   public function actionAddBandRate()
   {
       if (Yii::$app->request->isAjax) {
           $row = Yii::$app->request->post('BandRate');
           if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
               $row[] = [];
           return $this->renderAjax('_formBandRate', ['row' => $row]);
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
   }
   
   /**
   * Action to load a tabular form grid
   * for Event
   * @author Yohanes Candrajaya <moo.tensai@gmail.com>
   * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
   *
   * @return mixed
   */
   public function actionAddEvent()
   {
       if (Yii::$app->request->isAjax) {
           $row = Yii::$app->request->post('Event');
           if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
               $row[] = [];
           return $this->renderAjax('_formEvent', ['row' => $row]);
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
   }
   
   /**
   * Action to load a tabular form grid
   * for UserEvent
   * @author Yohanes Candrajaya <moo.tensai@gmail.com>
   * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
   *
   * @return mixed
   */
   public function actionAddUserEvent()
   {
       if (Yii::$app->request->isAjax) {
           $row = Yii::$app->request->post('UserEvent');
           if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
               $row[] = [];
           return $this->renderAjax('_formUserEvent', ['row' => $row]);
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
   }
   
   /**
   * Action to load a tabular form grid
   * for Venue
   * @author Yohanes Candrajaya <moo.tensai@gmail.com>
   * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
   *
   * @return mixed
   */
   public function actionAddVenue()
   {
       if (Yii::$app->request->isAjax) {
           $row = Yii::$app->request->post('Venue');
           if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
               $row[] = [];
           return $this->renderAjax('_formVenue', ['row' => $row]);
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
   }
}
