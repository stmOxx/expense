<?php

class Model
{
	
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/

	// метод выборки данных
    protected  $dbh;

    function __construct(){
        $dsn = 'mysql:dbname=expenses; host=localhost; charset=UTF8';
        $user = 'root';
        $password = 'root';
        try {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
        $this->setDbh($dbh);
    }

    protected function setDbh($dbh){
        $this->dbh = $dbh;
    }

    protected function getDbh(){
        return $this->dbh;
    }

	public function get_data()
	{
		// todo
	}

}