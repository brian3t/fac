<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

?>
<div class="company-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id',
        'name',
        'website',
        'headline',
        'industry',
        'phone_number',
        'address1',
        'address2',
        'city',
        'state',
        'postal_code',
        'num_of_employee',
        'annual_revenue',
        'facebook_fans',
        'twitter_handle',
        'twitter_followers',
        'timezone',
        'description',
        'line_of_business',
        'general_email:email',
        'country',
        'work_phone',
        'fax',
        'webpage',
        'facebook',
        'linkedin_company_page',
        'yahoo',
        'twitter',
        'instagram',
        'google',
        'note',
        [
            'attribute' => 'belongCompany.name',
            'label' => 'Belong Company',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>