<?php

class Model
{
    public static $conn = '';
    public $totalMenu = [];

    function __construct()
    {
        $serverName = 'localhost';
        $userName = 'root';
        $password = '';
        $dbname = 'kundenverwaltung';

        $attr = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
        self::$conn = new PDO('mysql:host=' . $serverName . ';dbname=' . $dbname, $userName, $password, $attr);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function doSelect($sql, $values = [], $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)      //Select from table
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetchStyle);
        } else {
            $result = $stmt->fetch($fetchStyle);
        }
        return $result;
    }

    public static function tokenSet()
    {
        $token = time();
        Model::sessionInit();
        Model::sessionSet("token", $token);
        return $token;
    }

    public static function sessionInit()
    {
        @session_start();
    }

    public static function sessionSet($name, $value)
    {                                                            //a new Sassion 
        $_SESSION[$name] = $value;
    }

    public static function tokenGet($formToken)
    {
        Model::sessionInit();
        if (isset($_SESSION['token'])) {
            $sessionToken = $_SESSION['token'];
            unset($_SESSION['token']);
            if ($formToken == $sessionToken) {
                return true;
            } else {
                return false;
            }
        }
    }

    function validate($data)                                   //text input remove from invalid charackter
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function doQuery($sql, $values = [])
    {                                                           //Insert into Table
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $values) {
            $stmt->bindValue($key + 1, $values);
        }
        $pdoExec = $stmt->execute();
    }

    function doDelete($sql, $values = [], $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)       //Delete from Table
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $pdoExec = $stmt->execute();
        if ($pdoExec) {
            return true;
        } else {
            return false;
        }
    }
}
