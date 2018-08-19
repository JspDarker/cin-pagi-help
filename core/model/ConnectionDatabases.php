<?php

class ConnectionDatabases
{
    private $host       = 'localhost';
    private $user       = 'dev';
    private $password   = 'zxcv';
    private $db_name    = 'dev_thanh';
    private $conn       = NULL;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=". $this->host. ";dbname=" .$this->db_name, $this->user, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function connect()
    {
        return $this->conn;
    }

    public function prepareParams($sql, $options = [])
    {
        $stmt = $this->conn->prepare($sql);
        foreach ($options as $key => $value) {
            $stmt->bindValue($key,$value);
        }
        return $stmt;
    }

    //sd cho lenh INSERT/UPDATE/DELETE
    function exeQuery($sql, $options = [])
    {
        $stmt = $this->prepareParams($sql,$options);
        return $stmt->execute();
    }

    // sd cho cau SELECT return 1 data
    function loadRow($sql,$options = [])
    {
        $stmt = $this->prepareParams($sql,$options);
        $check = $stmt->execute();
        if($check){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else return false;
    }

    //sd cho cau SELECT return more datas
    function loadRows($sql,$options=[])
    {
        $stmt = $this->prepareParams($sql,$options);
        $check = $stmt->execute();
        if($check){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        else return false;
    }
}