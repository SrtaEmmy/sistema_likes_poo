<?php 



class Database{
    public static function connect(){
        $connection = new mysqli('localhost', 'root', '', 'likes_system');
        $connection->query("SET NAMES 'utf8'");
        return $connection;
    }
}






?>