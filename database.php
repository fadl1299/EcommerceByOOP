<?php
class Database
{

    public $con;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $dsn = 'mysql:host=localhost;dbname=shop';
        $user = 'root';
        $pass = '';
        $option = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
        );
        try {
            $this->con = new PDO($dsn, $user, $pass, $option);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'faild to connect ' . $e->getMessage();
        }
    }
}
