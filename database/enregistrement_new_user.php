<?php
  include('db_connect.php');

  /** Reception des donnees du bordereau */
    if(isset($_POST['login'])){
      $login = $_POST['login'];
    }
    
    if(isset($_POST['mot_de_passe'])){
      $mot_de_passe = $_POST['mot_de_passe'];
    }
    
    if(isset($_POST['fonction'])){
        $fonction = $_POST['fonction'];
    }
    
    
    try{
        $sql = "INSERT INTO users (login, password, fonction)
                VALUES(:login, :mot_de_passe, :fonction)";
        $prepared_sql = $db_conn->prepare($sql);
        $prepared_sql->bindValue(':login', $login);
        $prepared_sql->bindValue(':mot_de_passe', $mot_de_passe);
        $prepared_sql->bindValue(':fonction', $fonction);
        $prepared_sql->execute();
        
        echo 'success';
    }catch(EXCEPTION $e){
        echo $e->getMessage();//"failed";//.
    }
?>