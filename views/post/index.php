<?php

use yii\helpers\Html;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_posts-list-item',
        'options' => [
            'tag' => 'ul',
            'class' => 'list-unstyled',
        ],
        'itemOptions' => [
            'tag' => false,
        ],
        'layout' => '{items}{pager}',
    ]); ?>

</div>
