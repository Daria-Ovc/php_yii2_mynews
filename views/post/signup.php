<?php

$this->title = Yii::$app->name;
?>

<?php
use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="row">
        <h2 style="text-align: center"> Регистрация: </h2>

        <?php
        $form = ActiveForm::begin(['class'=>'form_horizontal']);
        ?>

        <h3> Адрес электронной почты: </h3>
        <?= $form->field($model, 'username')->textInput(['autofocus'=>true])->label(false); ?>
        <h3> Пароль: </h3>
        <?= $form->field($model, 'password')->passwordInput()->label(false)?>
        <br>
        <div>
            <button type="submit" class="btn btn-success" style="font-size: 20px">Зарегистрироваться</button>
        </div>

        <?php
        ActiveForm::end();
        ?>

    </div>
</div>