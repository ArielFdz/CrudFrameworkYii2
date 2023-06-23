<?php

use common\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

//SE AGREGAN LAS CLASES/MODELOS NECESARIOS PARA EL MAPEO DEL ESTATUS
use common\models\Status;
use common\models\Project;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\search\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tareas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Tarea', ['create'], ['class' => 'btn btn-success']) ?>
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
                'filter' => ArrayHelper::map(Status::find()->all(), 'id', 'name'),   
            ],
            // 'status_id',
            [
                'attribute' => 'status_id', 
                'value' => function($model)
                            {
                                $estado= Status::findOne($model->status_id); //select * from status where
                                return $estado->description;
                            },
                'filter' => ArrayHelper::map(Status::find()->all(), 'id', 'description'),   
            ],
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Task $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
