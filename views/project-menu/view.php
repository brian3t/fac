<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectMenu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Project Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-menu-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Project Menu'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'page.name',
            'label' => 'Page',
        ],
        'name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Page<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnPage = [
        ['attribute' => 'id', 'visible' => false],
        'project_id',
        'microsite_id',
        'name',
    ];
    echo DetailView::widget([
        'model' => $model->page,
        'attributes' => $gridColumnPage    ]);
    ?>
</div>
