<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>

<section class="blog-post-area">
    <div class="container">
        <div class="row">
            <div class="blog-post-area-style">

                <h2 style="text-align: center"> СПОРТ </h2>

                <?php foreach ($posts as $post): ?>
                    <?php if ($post->category_id == 4): ?>

                        <div class="col-lg-4 col-md-4">
                            <div class="single-post">
                                <?= \yii\helpers\Html::img("{$post->img}", ['style' => 'width: 300px; height: 160px;']) ?>
                                <h3><a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>"><?= $post->title ?></a></h3>
                                <h4><span>Категория: <span class="author-name">
                                       <?= $post->category->alias ?>
                                </span></span></h4>
                                <p>
                                    <?= $post->excerpt ?>
                                </p>
                                <h4><span> <?= Yii::$app->formatter->asDate($post->created_at) ?> </span></h4>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>
<br>