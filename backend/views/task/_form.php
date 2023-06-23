<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//SE AGREGAN LAS CLASES/MODELOS NECESARIOS PARA EL MAPEO DEL ESTATUS
use common\models\Status;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Task $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <!-- <?= $form->field($model, 'status_id')->textInput() ?> -->
    
    <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map(Status:: find()->All(), 'id', 'description')) ?>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
