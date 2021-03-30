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
  <p class="text-muted ">
      <!-- TODO: Is it correct way to format? Could we format in model? -->
      <?= Yii::$app->formatter->asDate($model->created_at).' '. $model->author->username ?>
  </p>
  <p class="lead"><?= HtmlPurifier::process($model->text) ?></p>
</li>
