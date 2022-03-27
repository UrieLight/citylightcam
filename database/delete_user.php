<?php
  include('db_connect.php');

  /** Reception de l'id de l'utilisateur choisi */
    
    if(isset($_POST['id'])){
      $id = $_POST['id'];
      
      //delete_user($id);
    }


  /** Ecriture en BD */

    //function delete_user($id){
        //echo "Fun_Id: ".$id;
        try{
            $sql = "DELETE FROM users WHERE id= :id";
            $prepared_sql = $db_conn->prepare($sql);
            $prepared_sql->bindValue(':id', $id);
            $prepared_sql->execute();
            
            echo 'success';
        }catch(EXCEPTION $e){
            echo $e->getMessage();//"failed";//.
        }
      
    //}
    
    
?>