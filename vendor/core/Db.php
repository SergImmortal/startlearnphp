<?php

class SimpleDB {
    
    protected static $servername;
    protected static $username;
    protected static $password;
    protected static $database;
    protected static $dbport;
    static $db;
    
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
    public function select($obj, $table, $otherParam = ''){
        self::connect();
        $query = "SELECT {$obj} FROM {$table} {$otherParam}";
        $result = mysqli_query(self::$db, $query) or die("Error" . mysqli_error($db));
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        };
        mysqli_close(self::$db);
        return $data;
    }
    // вставить данные
    public function insert($tabl, $row, $value){
        self::connect();
        $query = "INSERT INTO {$tabl}($row) VALUES({$value})";
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
    public function del($tabl, $where){
        self::connect();
        $query = "DELETE FROM {$tabl} {$where}";
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
    public function update($tabl, $value, $where){
        self::connect();
        echo $query = "UPDATE {$tabl} SET {$value} WHERE {$where}";
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
//UPDATE core_config_data SET value = 'Ваше значение' WHERE config_id = '81'
?>