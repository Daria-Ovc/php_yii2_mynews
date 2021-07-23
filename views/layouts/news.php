<?php

use app\assets\AppAsset;
use yii\helpers\Html;


AppAsset::register($this);

?>

<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php $this->registerCsrfMetaTags() ?>

        <title>
            <?= Html::encode($this->title) ?>
        </title>

        <?php $this->head() ?>

    </head>

    <body>

    <?php $this->beginBody() ?>

    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <h2><a href="/">ГЛАВНАЯ</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="menu">
                            <ul>
                                <li><a href="<?= \yii\helpers\Url::to(['/post/politic']) ?>">Политика</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/post/economy']) ?>">Экономика</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/post/science']) ?>">Наука</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/post/sport']) ?>">Спорт</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/post/education']) ?>">Образование</a></li>
                            </ul>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="menu">
                            <ul>
                                <li><a href="<?= \yii\helpers\Url::to(['/post/signup']) ?>" style="font-weight: bolder; color: #0a73bb">Регистрация</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/post/login']) ?>" style="font-weight: bolder; color: #0a73bb">Вход</a></li>

                                <!-- Если пользователь авторизован, то добавляем его имя и кнопку "выйти" в шапку сайта -->
                                <?php
                                if(!Yii::$app->user->isGuest)
                                {
                                    ?>
                                    <li style="margin-left: 6px; margin-right: 6px; font-weight: bolder; color: #0a73bb">
                                        <?=Yii::$app->user->identity->username;?>
                                    </li>
                                    <li><a href="<?= \yii\helpers\Url::to(['/post/logout']) ?>" style="font-weight: bolder; color: #0a73bb">Выйти</a></li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?= $content ?>

    </div>

    <?php $this->endBody() ?>

    </body>

    </html>

<?php $this->endPage() ?>