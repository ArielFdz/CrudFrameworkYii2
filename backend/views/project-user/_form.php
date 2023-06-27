<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//SE AGREGAN LAS CLASES/MODELOS NECESARIOS PARA EL MAPEO DEL ESTATUS
use common\models\User;
use common\models\Project;
use common\models\Role;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var common\models\ProjectUser $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="project-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'project_id')->textInput() ?> -->
    <?= $form->field($model, 'project_id')->dropDownList(ArrayHelper::map(Project:: find()->All(), 'id', 'name')) ?>

    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->
    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User:: find()->All(), 'id', 'username')) ?>

    <!-- <?= $form->field($model, 'role_id')->textInput() ?> -->
    <?= $form->field($model, 'role_id')->dropDownList(ArrayHelper::map(Role:: find()->All(), 'id', 'nombre')) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
