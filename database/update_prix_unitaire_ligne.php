<?php
  include('db_connect.php');

  /** Reception des donnees de l'utilisateur choisi */
    
    /*if(isset($_POST['id'])){
      $ligne_id = $_POST['id'];
    }*/
    
    
    if(isset($_POST['prix_unitaire'])){
        $prix_unitaire = $_POST['prix_unitaire'];
    }


  /** Ecriture en BD */
    
    try{
        $add_new_price = "INSERT INTO ligne (prix_unitaire)
                VALUES(:prix_unitaire)
                ";
        $prepared_sql = $db_conn->prepare($add_new_price);
    
        //$prepared_sql->bindValue(':ligne_id', $ligne_id);
        $prepared_sql->bindValue(':prix_unitaire', $prix_unitaire);
    
        $prepared_sql->execute();
    
        echo 'success';
    
    }catch(EXCEPTION $e){
        echo $e->getMessage();
    }
    
    
?>