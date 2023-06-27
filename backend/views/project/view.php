<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//NUEVAS
use common\models\Task;
use common\models\Project;
use common\models\ProjectUser;
use common\models\User;
use common\models\Role;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Status;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Project $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este registro?',
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
            'created_at',
            'updated_at',
            // 'created_by',
            // 'updated_by',
            [
                'attribute'=>'created_by',
                'value'=>User::findOne($model->created_by)->username
            ],
            [
                'attribute'=>'updated_by',
                'value'=>User::findOne($model->updated_by)->username
            ],
        ],
    ]) ?>

    <p>
        <!-- <?= Html::a('Crear Tarea', ['create'], ['class' => 'btn btn-success']) ?> -->
        <?= Html::a('Crear tareas',['task/create', 'project_id' => $model->id], ['class' => 'btn btn-success btn-small']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'name',
            'description:ntext',
            // 'project_id',
            [
                'attribute' => 'project_id', 
                'value' => function($model)
                            {
                                $estado= Project::findOne($model->project_id); //select * from status where
                                return $estado->description;
                            },
                // 'filter' => ArrayHelper::map(Status::find()->all(), 'id', 'name'),   
            ],
            // 'status_id',
            [
                'attribute' => 'status_id', 
                'value' => function($model)
                            {
                                $estado= Status::findOne($model->status_id); //select * from status where
                                return $estado->description;
                            },
                // 'filter' => ArrayHelper::map(Status::find()->all(), 'id', 'description'),   
            ],
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Task $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
            ['class' => 'yii\grid\ActionColumn','controller' => 'task','template' => '{view} {update} {delete}'],
        ],
    ]); ?>

    <p>
        <!-- <?= Html::a('Crear Asignación de Proyecto', ['create'], ['class' => 'btn btn-success']) ?> -->
        <?= Html::a('Asignar Proyecto',['project-user/create', 'project_id' => $model->id], ['class' => 'btn btn-success btn-small']) ?>
    
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProviderEjemplo,
        'filterModel' => $searchModel2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'project_id',
            [
                'attribute' => 'project_id', 
                'value' => function($model)
                            {
                                $estado= Project::findOne($model->project_id); //select * from status where
                                return $estado->description;
                            },
                'filter' => ArrayHelper::map(Project::find()->all(), 'id', 'name'),   
            ],
            // 'user_id',
            [
                'attribute' => 'user_id', 
                'value' => function($model)
                            {
                                $nombreRol= User::findOne($model->user_id); //select * from role where
                                return $nombreRol->username;
                            },
                'filter' => ArrayHelper::map(User::find()->all(), 'id', 'username'),   
            ],
            // 'role_id',
            [
                'attribute' => 'role_id', 
                'value' => function($model)
                            {
                                $nombreRol= Role::findOne($model->role_id); //select * from role where
                                return $nombreRol->nombre;
                            },
                'filter' => ArrayHelper::map(Role::find()->all(), 'id', 'nombre'),   
            ],
            
            // //Por defecto
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, ProjectUser $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'project_id' => $model->project_id, 'user_id' => $model->user_id]);
            //      }
            // ],
            ['class' => 'yii\grid\ActionColumn','controller' => 'project-user','template' => '{view} {update} {delete}'],
        ],
    ]); ?>

    
</div>
