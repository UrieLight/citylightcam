<?php
    session_start();
    $auth = false;
    
    include('../database/db_connect.php');
  
    //if(isset($_POST['login']) && isset($_POST['password'])){
    
    if(isset($_POST['username']) && isset($_POST['user_pwd'])){
        //echo 'Login bien recu';
        $login = $_POST['username'];
        $password = $_POST['user_pwd'];
        
        try{ 
            $sql = "SELECT * FROM users where login =:login AND password=:password";
            $prepared_sql = $db_conn->prepare($sql);
            $prepared_sql->bindValue(':login', $login);
            $prepared_sql->bindValue(':password', $password);
            $prepared_sql->execute();
            
            $result = $prepared_sql->fetch(PDO::FETCH_ASSOC);
            //print_r($result["login"]);
            
            if($result["login"] == $login && $result["password"] == $password){
                $auth = true;
                
                $_SESSION['username'] = $result["login"];
                $_SESSION['userfunc'] = $result["fonction"];
                $_SESSION['start'] = time();
                
                $connexion_logs_file = fopen("../pages/Accueil/connexion_logs.txt", "a") or die("Unable to open file!");
                $connexn_log_msg = "\nUser: ".$_SESSION['username']." get connected ".date("Y-m-d h+1:i:sa");
                fwrite($connexion_logs_file, $connexn_log_msg);
                fclose($connexion_logs_file);
            }
        }catch(EXCEPTION $e){
            echo "Oups!! ".$e->getMessage();//"failed";//.
        }
    }/*else
        echo "Veuillez entrer vos paramètres de connexion";*/
    
    //si l'authentification est ok, renvoyer OK pour la suite, sinon, "NOK" pour afficher l'erreur.
    if($auth)
        echo "OK";
    else
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