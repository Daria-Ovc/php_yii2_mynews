<?php

$this->title = Yii::$app->name;
?>

<?php
use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="row">
        <h2 style="text-align: center"> Авторизация: </h2>

        <?php $form = ActiveForm::begin(['class'=>'form_horizontal']); ?>

        <h3> Логин (почта mail): </h3>
        <?= $form->field($login_model, 'username')->textInput()->label(false); ?>
        <h3> Пароль: </h3>
        <?= $form->field($login_model, 'password')->passwordInput()->label(false)?>
        <br>
        <div>
            <button type="submit" class="btn btn-primary" style="font-size: 20px">Войти</button>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>