<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Markdown;
use yii\helpers\HtmlPurifier;
use yii\helpers\BaseStringHelper;
?>

<li class="pb-2">
  <h2>
    <a href="<?= Url::toRoute(['post/view', 'id' => $model->id]) ?>">
      <?= Html::encode($model->title) ?>
    </a>
  </h2>
  <p class="text-muted ">
      <!-- TODO: Is it correct way to format? Could we format in model? -->
      <?= Yii::$app->formatter->asDate($model->created_at).' '. $model->author->username ?>
  </p>
  <hr>
</li>
