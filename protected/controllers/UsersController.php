<?php

class UsersController extends Controller
{
	public function actionIndex()
	{
        if(Yii::app()->user->isGuest)
            $this->redirect("login");
		$this->render('index');
	}

    public function actionLogin()
    {
        if(!Yii::app()->user->isGuest)
            $this->redirect(array("site/index"));
        $user_login = new Users;
        $user_registrate = new Users;
        if(isset($_POST['Users']))
        {
            if($_POST['Users']['scenario'] == 'login')
            {
                $user_login->attributes = $_POST['Users'];
                $identity=new UserIdentity($user_login->username,md5($user_login->password));
                if($identity->authenticate())
                {
                    Yii::app()->user->login($identity);
                    $this->redirect(array("site/index"));
                }
                else
                    $user_login->addError('', 'Неверное имя пользователя / пароль!');
            }
            else if($_POST['Users']['scenario'] == 'registrate')
            {
                $user_registrate->attributes = $_POST['Users'];
                $user_registrate->password = $user_registrate->password;
                if($user_registrate->save())
                {
                    $identity=new UserIdentity($user_registrate->username,$user_registrate->password);
                    if($identity->authenticate())
                    {
                        Yii::app()->user->login($identity);
                        $this->redirect(array("site/index"));
                    }
                    else
                        $user_registrate->addError('', 'Неверное имя пользователя / пароль!');
                }
            }
        }
        $this->render("login_registrate", array('login'=>$user_login, 'registrate'=>$user_registrate));
    }

    public function actionProfile()
    {
        $User = Users::model()->findByPk(Yii::app()->user->id);
        $this->render("Profile", array('user'=>$User));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array("site/index"));
    }
}