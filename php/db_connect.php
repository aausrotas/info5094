<?php 
    define("DBHOST", "localhost");
    define("DBDB", "paths");
    define("DBUSER", "lamp2user");
    define("DBPW", "info5094");

    function connectDB(){
        $dsn = "mysql:host=".DBHOST.";dbname=".DBDB.";charset=utf8";
        try{
            $db_conn = new PDO($dsn, DBUSER, DBPW);
            return $db_conn;
        } catch (PDOException $e){
            return FALSE;
        }
    }
?>