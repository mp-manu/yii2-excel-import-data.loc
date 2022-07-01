<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ImportData */

$this->title = 'Create Import Data';
$this->params['breadcrumbs'][] = ['label' => 'Import Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="import-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
