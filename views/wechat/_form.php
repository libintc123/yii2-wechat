<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use callmez\wechat\models\Wechat;
use callmez\wechat\widgets\FileApi;
?>

<div class="wechat-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>
    <?php  ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?php if (!$model->isNewRecord): ?>

        <?= $form->field($model, 'account')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'original')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'type')->inline()->radioList(Wechat::$types) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?//= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'app_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'app_secret')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'encoding_type')->inline()->radioList(Wechat::$encodings) ?>

        <?= $form->field($model, 'encoding_aes_key')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'hash')->textInput(['disabled' => true]) ?>

        <?= $form->field($model, 'access_token')->textInput(['disabled' => true]) ?>

        <?= $form->field($model, 'avatar')->widget(FileApi::className(), [
            'jsOptions' => [
                'url' => ['upload', 'id' => $model->id]
            ]
        ]) ?>

        <?= $form->field($model, 'qrcode')->widget(FileApi::className(), [
            'jsOptions' => [
                'url' => ['upload', 'id' => $model->id]
            ]
        ]) ?>

    <?php endif ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
