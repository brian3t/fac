<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SocialAccount */

?>
<div class="social-account-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->username) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'user.username',
            'label' => 'User',
        ],
        'provider',
        'client_id',
        'data:ntext',
        'code',
        'created_at',
        'email:email',
        'username',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>