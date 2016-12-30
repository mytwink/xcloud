<?php

class User{

    public $id, $password, $email, $name, $surname, $right = 1, $avatar, $last_seen;

    public function __construct(){

        if(isset($_REQUEST['login']) && isset($_REQUEST['password'])){
            $this->check(
                strtolower(trim($_REQUEST['login'])),
                Str::hash(strtolower(trim($_REQUEST['password'])))
                );
        }

        else if(isset($_COOKIE['login']) && isset($_COOKIE['password'])){
            $this->check($_COOKIE['login'], $_COOKIE['password']);
        }

        else if(isset($_SESSION['login']) && isset($_SESSION['password'])){
            $this->check($_SESSION['login'], $_SESSION['password']);
        }

    }


    public function check(string $login, string $password){

        $_SESSION['login'] = ' ';
        $_SESSION['password'] = ' ';
        $_SESSION['id'] = ' ';
        setCookie('login',' ', time()+(3600*24*30),'/',SITE);
        setCookie('password',' ', time()+(3600*24*30),'/',SITE);

        $res = DB::query('SELECT * FROM `user` WHERE login=?',[$login]);
        if($res->rowCount() == 1){
            $res = $res->fetch();


            if($res['login'] == $login && $res['password'] == $password){

                $this->id = $res['id'];
                $this->login = $res['login'];
                $this->password = $res['password'];
                $this->email = $res['email'];
                $this->name = $res['name'];
                $this->surname = $res['surname'];
                $this->right = $res['right'];
                $this->avatar = $res['avatar'];
                $this->last_seen = time();

                DB::query('UPDATE `user` SET `last_seen` = ? WHERE `id` = ?',[$this->last_seen, $this->id]);

                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
				$_SESSION['id'] = $res['id'];

                //if(1 == ($_POST['save_cookie'] ?? 0)){
                    setCookie('login',$login, time()+(3600*24*30),'/', SITE);
                    setCookie('password',$password, time()+(3600*24*30),'/', SITE);
                //  }

            }
        }

    }


}

?>