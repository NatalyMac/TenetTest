<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs']['user/index'] = $this->title;
?>

<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php
    Modal::begin([
        'id' =>'modal',
        'footer' => '<a href="user/index" class="btn btn-primary" data-dismiss="modal">Close</a>',
    ]);

    Modal::end();
?>

<div class="user-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'email:email',
            [
                'header'=>'Details',
                'value'=> function($data)
                {
                    return  Html::a(Yii::t('app', ' {modelClass}', [
                        'modelClass' => 'details',
                    ]), ['user/view','id'=>$data->id], ['class' => 'btn btn-success popupModal']);
                },
                'format' => 'raw'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php
    $this->registerJs("$(function() {
        $('.popupModal').click(function(e) {
        e.preventDefault();
        $('#modal').modal('show').find('.modal-body')
        .load($(this).attr('href'));
        });
    });"
    ); ?>
