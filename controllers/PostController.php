<?php

namespace app\controllers;

use Yii;

use app\models\Post;
use app\models\Signup;
use app\models\Login;

use yii\data\Pagination;
use yii\web\HttpException;

class PostController extends \yii\web\Controller
{

    // главная страничка, отображение всех статей
    public function actionIndex()
    {
        $query = Post::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render(
            'index',
            [
                'posts' => $posts,
                'pages' => $pages,
            ]
        );
    }

    // отображение отдельных статей на отдельных страничках
    public function actionView()
    {
        //получаем айди статьи, которую необходимо вывести:
        $id = \Yii::$app->request->get('id');

        //получаем пост из БД по айди:
        $post = Post::findOne($id);

        //если пост не найден в БД, выдаем 404 ошибку:
        if (empty($post)) throw new HttpException(444, 'Извините, такой страницы не существует.');

        return $this->render('view', compact('post'));
    }

    // отображение новостей с категорией "политика"
    public function actionPolitic()
    {
        $posts = Post::find()->all();
        return $this->render('politic', compact('posts'));
    }

    // отображение новостей с категорией "экономика"
    public function actionEconomy()
    {
        $posts = Post::find()->all();
        return $this->render('economy', compact('posts'));
    }

    // отображение новостей с категорией "наука"
    public function actionScience()
    {
        $posts = Post::find()->all();
        return $this->render('science', compact('posts'));
    }

    // отображение новостей с категорией "спорт"
    public function actionSport()
    {
        $posts = Post::find()->all();
        return $this->render('sport', compact('posts'));
    }

    // отображение новостей с категорией "образование"
    public function actionEducation()
    {
        $posts = Post::find()->all();
        return $this->render('education', compact('posts'));
    }

    // страничка с регистрацией
    public function actionSignup()
    {
        $model = new Signup();

        if (isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');

            // проверка, соответствуют ли полученные данные нашим правилам валидации,
            // и сохранен ли пользователь в базу:
            if ($model->validate() && $model->signup())
            {
                return $this->goHome();
            }
            else
            {
                var_dump("Ошибка! Пользователь уже существует в базе");
                die;
            }
        }

        return $this->render('signup', ['model' => $model]);
    }

    // страничка с авторизацией
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $login_model = new Login();

        if (Yii::$app->request->post('Login'))
        {
            $login_model->attributes = Yii::$app->request->post('Login');

            if ($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login', ['login_model' => $login_model]);
    }

    // выход из системы
    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest)
        {
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }
}
