<?php



function checkUserName($login){

    $regEx = '/^[A-Za-z0-9_-]{3,16}$/';
    preg_match($regEx, $login, $res);

    if(!$res) return false;

    $dbres = DB::query('SELECT `id` FROM `user` WHERE `login` = ?',
        [strtolower(trim($login))]);
    return $dbres->rowCount() == 0;
}

function checkPass($pass){

    $regEx = '/^[A-Za-z0-9_!@#$%^&*()\'+="-]{6,32}$/';
    preg_match($regEx, $pass, $res);

return $res;
}



function insertNewUser($login,$password){

    $dbres = DB::query('INSERT INTO `user` (`login`, `password`, `right`) VALUES (?,?, 2)',
        [strtolower(trim($login)),
        Str::hash(strtolower(trim($password)))]);

    return (DB::$db->lastInsertId());
}


if(isset($_POST['auth'])) {

    switch($_POST['auth']){

        case 'signin' : if($user->right > 1) echo 'welcome'; break;

        case 'checklogin' :

            $login = $_POST['checklogin'] ?? '';
            if(checkUserName($login)) echo 'login_free';

            break;
        case 'insertuser' :

            $login = $_POST['log'] ?? '';
            $password = $_POST['pass'] ?? '';
            if(checkUserName($login) && checkPass($password))
                if(insertNewUser($login,$password)) echo 'inserted';

            break;

    }


}









