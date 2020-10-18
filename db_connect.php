<?php
// DBサーバのURL
$db['host'] = "localhost";
// ユーザー名
$db['user'] = "root";
// ユーザー名のパスワード
$db['pass'] = "root";
// データベース名
$db['dbname'] = "furniture";

$db['dsn']= "mysql: host=localhost; dbname=furniture; charset=utf8";
function db_connect(){
    global $db;
    try {
        $dbh = new PDO($db['dsn'],$db['user'],$db['pass']);
        return $dbh ;
    } catch (PDOException $e) {
        echo 'Error:' . $e->getMessage();
        die();
    }
}
?>