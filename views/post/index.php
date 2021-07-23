<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>

<section class="bg-text-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-text">
                    <h3>МИРОВЫЕ НОВОСТИ И СОБЫТИЯ</h3>
                    <p>На сайте представлены актуальные новости и события, произошедшие в мире за последнее время. Здесь вы найдете статьи по различным категориям, обзоры, новости, их анализ.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-post-area">
    <div class="container">
        <div class="row">
            <div class="blog-post-area-style">

                <?php foreach ($posts as $post): ?>

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

                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <div class="pegination">
        <div class="nav-links">
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]) ?>
        </div>
    </div>
</section>