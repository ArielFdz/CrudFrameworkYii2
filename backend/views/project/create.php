<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Project $model */

$this->title = 'Crear Proyecto';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
