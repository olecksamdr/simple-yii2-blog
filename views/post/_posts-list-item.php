<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<li>
  
  <h2>
    <a href="<?= Url::toRoute(['post/view', 'id' => $model->id]) ?>">
      <?= Html::encode($model->title) ?>
    </a>
  </h2>
  <small><?= $model->created_at . $model->author->username ?></small>
  <p><?= HtmlPurifier::process($model->text) ?></p>
</li>
