<?php
    session_start();
    $auth = false;
    
    include('../database/db_connect.php');
  
    //if(isset($_POST['login']) && isset($_POST['password'])){
    
    if(isset($_POST['username']) && isset($_POST['user_pwd'])){
            echo "OK";
            $login = $_POST['username'];
            $password = $_POST['user_pwd'];
            //var_dump($_POST);// = array();
        /*
        try{  
            $sql = "SELECT * FROM users where login =:login AND password=:password";
            $prepared_sql = $db_conn->prepare($sql);
            $prepared_sql->bindValue(':login', $login);
            $prepared_sql->bindValue(':password', $password);
            $prepared_sql->execute();
            
            $result = $prepared_sql->fetch(PDO::FETCH_ASSOC);
            vardump($result);
        }catch(EXCEPTION $e){
            echo "Failed: ".$e->getMessage();//"failed";//.
        }*/
    }else
        echo "NOK";
    
    /*}else
        echo "NOK";*/
        //echo "No Post Data received.";
    
        
    
    
    
    /*if($_POST['login'] == $result['login'] && $_POST['password'] == $result['password']){
        
        $_SESSION['Username'] = $_POST['login'];
        header("Location: pages/Accueil/bordereaux.php");
        exit();
    }else
        echo 'Incorrect login of password';*/
?>