<?php

namespace app\override\grid;

use Yii;
use yii\grid;
use yii\helpers\Html;


class ActionColumn extends grid\ActionColumn
{
    protected function initDefaultButtons()
    {
        parent::initDefaultButtons();
        $this->buttons['view'] = function ($url, $model, $key) {
            $options = array_merge([
                'title' => Yii::t('yii', 'View'),
                'aria-label' => Yii::t('yii', 'View'),
                'data-pjax' => '0',
            ], $this->buttonOptions);
            return Html::a('View', $url, $options);
        };
        $this->buttons['update'] = function ($url, $model, $key) {
            $options = array_merge([
                'title' => Yii::t('yii', 'Update'),
                'aria-label' => Yii::t('yii', 'Update'),
                'data-pjax' => '0',
            ], $this->buttonOptions);
            return Html::a('Update', $url, $options);
        };
        $this->buttons['delete'] = function ($url, $model, $key) {
            $options = array_merge([
                'title' => Yii::t('yii', 'Delete'),
                'aria-label' => Yii::t('yii', 'Delete'),
                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'data-method' => 'post',
                'data-pjax' => '0',
            ], $this->buttonOptions);
            return Html::a('Delete', $url, $options);
        };
    }
    
}