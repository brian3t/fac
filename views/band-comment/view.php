<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BandComment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Band Comment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="band-comment-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Band Comment'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'band.name',
            'label' => 'Band',
        ],
        'comment',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Band<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBand = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'user_id',
        'logo',
        'lno_score',
        'type',
        'similar_to',
        'hometown_city',
        'hometown_state',
        'description',
        'website',
        'facebook',
        'twitter',
    ];
    echo DetailView::widget([
        'model' => $model->band,
        'attributes' => $gridColumnBand    ]);
    ?>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'email',
        'password_hash',
        'auth_key',
        'confirmed_at',
        'unconfirmed_email',
        'blocked_at',
        'registration_ip',
        'flags',
        'first_name',
        'last_name',
        'note',
        'phone_number_type',
        'phone_number',
        'birthdate',
        'birth_month',
        'birth_year',
        'favorite_genres',
        'favorite_venue_types',
        'website_url',
        'twitter_id',
        'facebook_id',
        'instagram_id',
        'google_id',
        'address1',
        'address2',
        'city',
        'state',
        'zipcode',
        'country',
        'last_login_at',
    ];
    echo DetailView::widget([
        'model' => $model->createdBy,
        'attributes' => $gridColumnUser    ]);
    ?>
</div>
