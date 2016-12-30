<?php

class DB{


    const HOSTNAME = 'localhost';
    const  DBNAME = 'xcloud';
    const  USERNAME = 'root';
    const  PASSWORD = '';

    public static $db;
    private static $j;

    public static function connectDB(){

      self::$db =  new PDO('mysql:hostname='.self::HOSTNAME.'; dbname='.self::DBNAME, self::USERNAME, self::PASSWORD);

        self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $codirovka = self::$db->prepare('SET NAMES `utf8`');
        $codirovka->execute();


        //Пользователи
        self::createTable('user', [
            'id' => 'int_ai',
            'login' => 'TEXT NOT NULL',
            'password' => 'TEXT NOT NULL',
            'email' => 'TEXT NOT NULL',            
            'name' => 'TEXT NOT NULL',
            'surname' => 'TEXT NOT NULL',
            'avatar' => 'TEXT NOT NULL',
            'right' => 'INT NOT NULL',
            'last_seen' => 'INT NOT NULL'
            ]);

        //Комментарии
        self::createTable('comment', [
            'id' => 'int_ai',
            'user_id' => 'INT NOT NULL',
            'page_id' => 'INT NOT NULL',
            'portal' => 'INT NOT NULL',
            'time' => 'INT NOT NULL',
            'text' => 'TEXT NOT NULL'
        ]);

        //Категории и жанры
        self::createTable('cat', [
            'id' => 'int_ai',
            'portal' => 'INT NOT NULL',
            'name' => 'TEXT NOT NULL'
        ]);

		//Фильмы
		self::createTable('media', [
			'id' => 'int_ai',
            'tag' => 'TEXT NOT NULL',
            'cat' => 'TEXT NOT NULL',
            'title' => 'TEXT NOT NULL',
            'des' => 'TEXT NOT NULL',
            'img' => 'TEXT NOT NULL',
            'screen' => 'TEXT NOT NULL',
            'link' => 'TEXT NOT NULL',
            'country' => 'TEXT NOT NULL',
			'year' => 'INT NOT NULL',
            'type' => 'INT NOT NULL',
            'actor' => 'INT NOT NULL',
            'size' =>  'INT NOT NULL',
            'added' => 'INT NOT NULL',
            'popular' => 'INT NOT NULL'
		]);

        //Софт
        self::createTable('soft', [
            'id' => 'int_ai',
            'tag' => 'TEXT NOT NULL',
            'cat' => 'TEXT NOT NULL',
            'title' => 'TEXT NOT NULL',
            'des' => 'TEXT NOT NULL',
            'img' => 'TEXT NOT NULL',
            'screen' => 'TEXT NOT NULL',
            'link' => 'TEXT NOT NULL',
            'support' => 'TEXT NOT NULL',
            'year' => 'INT NOT NULL',
            'version' => 'TEXT NOT NULL',
            'size' =>  'INT NOT NULL',
            'added' => 'INT NOT NULL',
            'popular' => 'INT NOT NULL'
        ]);

        //Игры
        self::createTable('game', [
            'id' => 'int_ai',
            'tag' => 'TEXT NOT NULL',
            'cat' => 'TEXT NOT NULL',
            'title' => 'TEXT NOT NULL',
            'des' => 'TEXT NOT NULL',
            'img' => 'TEXT NOT NULL',
            'screen' => 'TEXT NOT NULL',
            'link' => 'TEXT NOT NULL',
            'lang' => 'TEXT NOT NULL',
            'support' => 'TEXT NOT NULL',
            'format' => 'TEXT NOT NULL',
            'year' => 'INT NOT NULL',
            'size' =>  'INT NOT NULL',
            'added' => 'INT NOT NULL',
            'popular' => 'INT NOT NULL'
        ]);

        //Обучалки
        self::createTable('tutor', [
            'id' => 'int_ai',
            'tag' => 'TEXT NOT NULL',
            'cat' => 'TEXT NOT NULL',
            'title' => 'TEXT NOT NULL',
            'des' => 'TEXT NOT NULL',
            'img' => 'TEXT NOT NULL',
            'screen' => 'TEXT NOT NULL',
            'link' => 'TEXT NOT NULL',
            'lang' => 'TEXT NOT NULL',
            'size' =>  'INT NOT NULL',
            'added' => 'INT NOT NULL',
            'popular' => 'INT NOT NULL'
        ]);

        //Книги
        self::createTable('book', [
            'id' => 'int_ai',
            'tag' => 'TEXT NOT NULL',
            'cat' => 'TEXT NOT NULL',
            'title' => 'TEXT NOT NULL',
            'des' => 'TEXT NOT NULL',
            'img' => 'TEXT NOT NULL',
            'screen' => 'TEXT NOT NULL',
            'link' => 'TEXT NOT NULL',
            'lang' => 'TEXT NOT NULL',
            'author' => 'TEXT NOT NULL',
            'year' =>  'INT NOT NULL',
            'size' =>  'INT NOT NULL',
            'added' => 'INT NOT NULL',
            'popular' => 'INT NOT NULL'
        ]);

        //Музыка
        self::createTable('music', [
            'id' => 'int_ai',
            'tag' => 'TEXT NOT NULL',
            'cat' => 'TEXT NOT NULL',
            'name' => 'TEXT NOT NULL',
            'executor' => 'TEXT NOT NULL',
            'link' => 'TEXT NOT NULL',
            'year' =>  'INT NOT NULL',
            'size' =>  'INT NOT NULL',
            'added' => 'INT NOT NULL',
            'popular' => 'INT NOT NULL'
        ]);



    }

    // Создание таблиц
    public static function createTable($tn,$arr){

        $sql = 'CREATE TABLE IF NOT EXISTS `'.$tn.'` (';
        foreach($arr as $k=>$v){
            if($v=='int_ai') $v = 'INT NOT NULL AUTO_INCREMENT UNIQUE';

            $sql = $sql.'`'.$k.'` '.$v.',';
        }
        $sql = $sql.'PRIMARY KEY ( `id` ) ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
        $create_tables = self::$db->prepare($sql);
        $create_tables->execute();
    }






   


    //Запрос к БД
    public static function query($sql,$arr = array()){

        if(empty(self::$db)){
            self::connectDB();
        }


        $dbres = self::$db->prepare($sql);

        for($i=0; $i<count($arr); $i++){
            $dbres->bindParam($i+1,self::$j[$i]);
        }

        for($i=0; $i<count($arr); $i++){
            self::$j[$i] = $arr[$i];
        }

        $dbres->execute();


        return  $dbres;
    }


}

?>