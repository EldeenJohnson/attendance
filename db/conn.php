<?php
    //Developement connection
   /* $host = '127.0.0.1';
    $db = 'attendance';
    $user ='root';
    $pass = '';
    $charset = 'utf8mb4';*/

    //remote database connection
    $host = 'remotemysql.com';
    $db = '7cW7haEUA8';
    $user ='7cW7haEUA8';
    $pass = 'ymTvk8sFhT';
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        //echo 'DB Linked';
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        echo "<h1 class='text-danger'>No Database Found</h>";
       // throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin","password");
?>