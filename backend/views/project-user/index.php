<?php

use common\models\ProjectUser;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use common\models\Project;
use common\models\Role;
use common\models\User;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\search\ProjectUserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Proyectos Asignados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Proyecto Asignado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
            
            //Por defecto
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProjectUser $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'project_id' => $model->project_id, 'user_id' => $model->user_id]);
                 }
            ],
        ],
    ]); ?>


</div>
