<?php

class SimpleDB {
    
    protected static $servername;
    protected static $username;
    protected static $password;
    protected static $database;
    protected static $dbport;
    private $table;
    static $db;
     
    public function __construct($table_name){
        $this->table = $table_name;
        
    }
    
    public static function add($servername, $username, $password, $database, $dbport) {
        self::$servername = $servername;
        self::$username = $username;
        self::$password = $password;
        self::$database = $database;
        self::$dbport = $dbport;
    }
    
    // Create connection
    public static function connect(){
        $db = mysqli_connect(self::$servername, self::$username, self::$password, self::$database, self::$dbport);
        return self::$db = $db;
        // Check connection
        if (mysqli_connect_errno()) {
            printf("Не удалось подключиться: %s\n", mysqli_connect_error());
            exit();
        }
    }
    // выбрать данные
    public function select($obj, $otherParam = ''){
        self::connect();
        $query = "SELECT {$obj} FROM {$this->table} {$otherParam}";
        $result = mysqli_query(self::$db, $query) or die("Error" . mysqli_error($db));
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        };
        mysqli_close(self::$db);
        return $data;
    }
    // вставить данные
    public function insert($row, $value){
        self::connect();
        $query = "INSERT INTO {$this->table}($row) VALUES({$value})";
        $result = mysqli_query(self::$db, $query) or die("Error" . mysqli_error($db));
        mysqli_close(self::$db);
        if($result){
            $data = 'data inserted';
        }else{
            $data = 'insert error';
        }
        return $data;
    }
    // удалить данные
    public function del($where){
        self::connect();
        $query = "DELETE FROM {$this->table} {$where}";
        $result = mysqli_query(self::$db, $query) or die("Error" . mysqli_error($db));
        mysqli_close(self::$db);
        if($result){
            $data = 'data deleted';
        }else{
            $data = 'delet error';
        }
        return $data;
    }
    //обновить данные
    public function update($value, $where){
        self::connect();
        echo $query = "UPDATE {$this->table} SET {$value} WHERE {$where}";
        $result = mysqli_query(self::$db, $query) or die("Error" . mysqli_error($db));
        mysqli_close(self::$db);
        if($result){
            $data = 'data updated';
        }else{
            $data = 'update error';
        }
        return $data;
    }
}

?>