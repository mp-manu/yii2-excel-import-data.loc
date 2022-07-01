<?php

use yii\grid\ActionColumn;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImportDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчет по импортированным данным';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="import-data-index">
    <?= $this->render('_search', ['model' => $searchModel]) ?>
    <?php
    $gridColumns = [
            'id',
            'city',
            'lat',
            'lng',
            [
                    'attribute' => 'lighting',
                    'value' => function($model){
                        return ($model->lighting) ? 'Да' : 'Нет';
                    },
                    'filter' => ['1' => 'Да', 0 => 'Нет']
            ],
            'size',
            'side_type',
            'side',
            'price_type',
            'price_accommodation',
            'nds_accommodation',
            'kvant_accommodation',
            'impression_per_day',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\models\ImportData $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
    ];

    echo \kartik\grid\GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="fas fa-globe"></i> '.$this->title.'</h3>',
            'type'=>'success',

            'footer'=>false
        ],
    ]);
    ?>


</div>
