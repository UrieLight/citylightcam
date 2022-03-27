<?php
  include('db_connect.php');

  /** Reception des donnees de l'utilisateur choisi */
    
    if(isset($_POST['id'])){
      $user_id = $_POST['id'];
    }
    
    /*
        if(isset($_POST['login'])){
          $login = $_POST['login'];
        }
        
        if(isset($_POST['mot_de_passe'])){
          $mot_de_passe = $_POST['mot_de_passe'];
        }
    */
    
    if(isset($_POST['fonction'])){
        $new_function = $_POST['fonction'];
    }


  /** Ecriture en BD */
    
    try{
        $sql = "UPDATE users 
                SET fonction=:new_function
                WHERE id=:user_id
                ";
        $prepared_sql = $db_conn->prepare($sql);
    
        $prepared_sql->bindValue(':user_id', $user_id);
        $prepared_sql->bindValue(':new_function', $new_function);
    
        $prepared_sql->execute();
    
        echo 'success';
    
    }catch(EXCEPTION $e){
        echo $e->getMessage();
    }
    
    
?>