<?php

namespace app\controllers;

use app\models\Offer;
use Dompdf\Dompdf;
use mPDF;
use phpQuery;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * OfferController implements the CRUD actions for Offer model.
 */
class OfferController extends Controller
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['pdf'],
                    ], [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Offer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Offer::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Offer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Offer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Offer();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Offer model.
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
     * Deletes an existing Offer model.
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
     * Finds the Offer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Offer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Offer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPdf($id = 2, $browser = 0)
    {
        ini_set('display_errors', '0');
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <!--            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">-->
            <link href="http://admin.entertainmentdirectmetrics.com/css/bootstrap_print.css" rel="stylesheet" crossorigin="anonymous">
        </head>
        <body>

        <?php
        // instantiate and use the dompdf class
        $pdf = new mPDF();
        $model = $this->findModel($id);
        echo $this->renderAjax('print', ['model' => $model]);

        $output = ob_get_clean();

        // Output the generated PDF to Browser
        if (!$browser) {
            $pdf->setHTMLHeader('<img src="http://admin.entertainmentdirectmetrics.com/img/logo_sml.png" alt="logo"> 
<span style="font-size: 150%">Entertainment Direct Metrics</span>&emsp;&emsp; Offer '.$model->event_id);
            $pdf->WriteHTML(file_get_contents(__DIR__ . "/../web/css/bootstrap_print.css"), 1);
            $pdf->WriteHTML($output, 2);
            $date = (new \DateTime())->format('Ymd_h_i_s');
            $pdf->Output("ERM_Offer_{$model->event_id}_$date.pdf", 'I');
        }

        ?>
        </body>
    </html>
        <?php
        ini_set('display_errors', '1');
        return $output;
    }

    public function actionPdf_dompdf($id = 2, $browser = 0)
    {
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <!--            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">-->
            <link href="http://admin.ermlocal/css/bootstrap_print.css" rel="stylesheet" crossorigin="anonymous">
        </head>
        <body>

        <?php
        // instantiate and use the dompdf class
        $pdf = new Dompdf();

        // Create a HTML object with a basic div container
        phpQuery::newDocument();

        $body = pq('<div>');
        $div = pq('<div>');
        $div->addClass('row')->append(pq('<span>')->addClass('col-xs-6')->text('left'))->append(pq('<span>')->addClass('col-xs-6')->text('right'));

        $div2 = pq('<div>');
        $div2->addClass('row')->text('hi again');

        $body->append($div);
        //        $body->append('<br/>');
        $body->append($div2);

        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render the HTML to ob
        //        echo $body->html();
        echo $this->renderAjax('print', ['model' => $this->findModel($id)]);

        $output = ob_get_clean();
        $pdf->loadHtml($output);
        $pdf->render();

        // Output the generated PDF to Browser
        if (!$browser) {
            $pdf->stream();
        }

        ?>
        </body>
        </html>
        <?php
        return $output;
    }
}
