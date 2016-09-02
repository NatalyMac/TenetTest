<?php
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Update User: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class ='row'>
    <div class="col-sm-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'email:email',
                'phone',
                'district.name',
                'city.name',
                'street.name',
                'house.name',
                'flat',
            ],
        ]) ?>
    </div>
</div>
