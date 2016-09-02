<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\District;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['action' => $model->isNewRecord ? 'create' : 'update?id='.$model->id]) ?>

    <div class="form-inline">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(
        [
            'maxlength' => true,
            'placeholder' => 'email@email.com'
        ]) ?>
    </div>

    <?= $form->field($model, 'phone')->textInput(
        [
            'maxlength' => true,
            'placeholder' => '+38(044)555-55-55'
        ]) ?>

    <?= $form->field($model, 'district_id')->dropDownList(
        yii\helpers\ArrayHelper::map(District::find()->asArray()->all(),'id', 'name'),
            [
                'id' => 'district_id-id',
                'prompt' =>'Select area',
                
        ]) ?>

    <?=$form->field($model, 'city_id')->widget(DepDrop::className(), [
        'options'=>['id'=>'city_id-id'],
        'pluginOptions'=>[
        'depends'=>['district_id-id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['/city/lists'])
        ]
    ]);?>

    <?= Html::hiddenInput('input-type-1', 'Additional value 1', ['id'=>'input-type-1']);?>
    <?= Html::hiddenInput('input-type-2', 'Additional value 2', ['id'=>'input-type-2']);?>

     <?=$form->field($model, 'street_id')->widget(DepDrop::className(), [
         'type'=>DepDrop::TYPE_SELECT2,
         'options'=>['id'=>'street_id-id', 'placeholder'=>'Select ...'],
         'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
         'pluginOptions'=>[
         'depends'=>['city_id-id'],
         'url'=>Url::to(['/street/lists']),
         'params'=>['input-type-1', 'input-type-2']
        ]
    ]);?>

    <?=$form->field($model, 'house_id')->widget(DepDrop::className(), [
        'options'=>['id'=>'house_id-id'],
        'pluginOptions'=>[
            'depends'=>['street_id-id'],
            'placeholder'=>'Select...',
            'initialize' => true,
            'initDepends'=>['city_id_id'],
            'url'=>Url::to(['/house/lists'])
        ]
    ]);?>

    <?= $form->field($model, 'flat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
