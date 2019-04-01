<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;

$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Event'),
        'content' => $this->render('_detail', [
            'model' => $model,
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
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('User Event'),
        'content' => $this->render('_dataUserEvent', [
            'model' => $model,
            'row' => $model->userEvents,
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
