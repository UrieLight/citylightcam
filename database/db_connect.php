<?php

    $host = "localhost";
    $username = "cityligh_db_admin";
    $password = "Bu&;XU@T7_3p";


    try{
        $db_conn = new PDO("mysql:host=".$host.";dbname=cityligh_bordereaux_db", $username, $password, array(PDO::ATTR_PERSISTENT => true));
        $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    }catch(PDOException $e){
        echo "Connection attempt failed ".$e->getMessage();
    }

?>