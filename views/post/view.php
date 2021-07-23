<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>

<section class="blog-post-area">
    <div class="container">
        <div class="row">
            <div class="blog-post-area-style">
                <div class="col-lg-12 col-md-12">
                    <div class="single-post">

                        <?= \yii\helpers\Html::img("{$post->img}", ['style' => 'width: 700px; height: 400px;']) ?>
                        <h3><a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>"><?= $post->title ?></a></h3>
                        <p>
                            <?= $post->excerpt ?>
                        </p>
                        <h4><span> <?= Yii::$app->formatter->asDate($post->created_at) ?> </span></h4>
                        <p>
                            <?= $post->content ?>
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>