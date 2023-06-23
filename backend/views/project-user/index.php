<?php

use common\models\ProjectUser;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

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

            'project_id',
            'user_id',
            'role_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProjectUser $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'project_id' => $model->project_id, 'user_id' => $model->user_id]);
                 }
            ],
        ],
    ]); ?>


</div>
