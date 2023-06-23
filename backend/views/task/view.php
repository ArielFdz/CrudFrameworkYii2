<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//SE AGREGAN LAS CLASES/MODELOS NECESARIOS PARA EL MAPEO DEL ESTATUS
use common\models\Status;
use common\models\Project;

/** @var yii\web\View $this */
/** @var common\models\Task $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Realmente desea eliminar el registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            // 'project_id',
            [
                'attribute'=>'project_id',
                'value'=>Project::findOne($model->project_id)->name
            ],
            // 'status_id',
            [
                'attribute'=>'status_id',
                'value'=>Status::findOne($model->status_id)->description
            ],
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
