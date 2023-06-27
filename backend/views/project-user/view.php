<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//SE AGREGAN LAS CLASES/MODELOS NECESARIOS PARA EL MAPEO DEL ESTATUS
use common\models\User;
use common\models\Project;
use common\models\Role;

/** @var yii\web\View $this */
/** @var common\models\ProjectUser $model */

$this->title = $model->project_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'project_id' => $model->project_id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'project_id' => $model->project_id, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar el registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'project_id',
            [
                'attribute'=>'project_id',
                'value'=>Project::findOne($model->project_id)->name
            ],
            // 'user_id',
            [
                'attribute'=>'user_id',
                'value'=>User::findOne($model->user_id)->username
            ],
            // 'role_id',
            [
                'attribute'=>'role_id',
                'value'=>Role::findOne($model->role_id)->nombre
            ],
        ],
    ]) ?>

</div>
