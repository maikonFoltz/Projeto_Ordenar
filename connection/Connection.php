<?php
    $dsn = "mysql:dbname=projeto_ordenar; host=localhost:8889";
    $dbuser = "admin";
    $dbpass = "admin";

    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);       
    }catch(PDOException $e){
        echo "falha na conecção ".$e->getMessage();
        exit;
    }


?>