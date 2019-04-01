<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;

$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Band'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Band Comment'),
        'content' => $this->render('_dataBandComment', [
            'model' => $model,
            'row' => $model->bandComments,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Band Event'),
        'content' => $this->render('_dataBandEvent', [
            'model' => $model,
            'row' => $model->bandEvents,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Band Follow'),
        'content' => $this->render('_dataBandFollow', [
            'model' => $model,
            'row' => $model->bandFollows,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Band Rate'),
        'content' => $this->render('_dataBandRate', [
            'model' => $model,
            'row' => $model->bandRates,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
