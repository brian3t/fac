<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;

$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Marketing'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Mk Radio'),
        'content' => $this->render('_dataMkRadio', [
            'model' => $model,
            'row' => $model->mkRadios,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Mk Television'),
        'content' => $this->render('_dataMkTelevision', [
            'model' => $model,
            'row' => $model->mkTelevisions,
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
