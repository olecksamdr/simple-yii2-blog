<?php

use yii\helpers\Html;
use yii\helpers\Markdown;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view container-fluid">
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>

    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>

        <p class="text-muted ">
        <!-- TODO: Is it correct way to format? Could we format in model? -->
        <?= Yii::$app->formatter->asDate($model->created_at).' '. $model->author->username ?>
        </p>
    </div>
    <hr>

    <p class="lead">
        <?= HtmlPurifier::process(Markdown::process($model->text)) ?>
    </p>

</div>
