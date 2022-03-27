<?php
  include('db_connect.php');

  /** Reception des donnees du bordereau */
    if(isset($_POST['bordereau'])){
      //echo 'Bordereau bien recu';
      $bordereau = $_POST['bordereau'];
      //echo 'bordereau: '.$bordereau;
    }
    
    if(isset($_POST['dateembarquement'])){
      //echo 'Bordereau bien recu';
      
      //echo 'Ant_dateembarquement: '.$_POST['dateembarquement'];
      $dateembarquement = date_format_db($_POST['dateembarquement']);
      //echo 'dateembarquement: '.$dateembarquement;
    }
    
    if(isset($_POST['dateentree'])){
      //echo 'Bordereau bien recu';
      
      //echo 'Ant_dateentree: '.$_POST['dateentree'];
      if($_POST['dateentree']=="")
        $dateentree = null;
      else
        $dateentree = date_format_db($_POST['dateentree']);
      //echo 'dateentree: '.$dateentree;
    }
    
    if(isset($_POST['nom_client'])){
      //echo 'Bordereau bien recu';
      $nom_client = $_POST['nom_client'];
      //echo 'nom_client: '.$nom_client;
    }
    
    if(isset($_POST['num_client'])){
      //echo 'Bordereau bien recu';
      $numero_client = $_POST['num_client'];
      //echo 'numero_client: '.$numero_client;
    }
    
    if(isset($_POST['nom_marque'])){
      //echo 'Bordereau bien recu';
      $marque = $_POST['nom_marque'];
      //echo 'marque: '.$marque;
    }
    
    if(isset($_POST['nbre_colis'])){
      //echo 'Bordereau bien recu';
      $nombre_colis = $_POST['nbre_colis'];
      //echo 'nbre_colis: '.$nombre_colis;
    }
    
    if(isset($_POST['num_conteneur'])){
      //echo 'Bordereau bien recu';
      $numero_conteneur = $_POST['num_conteneur'];
      //echo 'num_conteneur: '.$numero_conteneur;
    }
    
    if(isset($_POST['cubage'])){
      //echo 'Bordereau bien recu';
      $cubage = $_POST['cubage'];
      //echo 'cubage: '.$cubage;
    }
    
    if(isset($_POST['montant_total'])){
      //echo 'Bordereau bien recu';
      $prix_total = $_POST['montant_total'];
      //echo 'montant_total: '.$prix_total;
    }
    
    if(isset($_POST['percu'])){
      //echo 'Bordereau bien recu';
      if($_POST['percu']=="")
        $montant_percu = 0;
      else
        $montant_percu = $_POST['percu'];
      //echo 'montant_percu: '.$montant_percu;
    }
    
    if(isset($_POST['reste'])){
      //echo 'Bordereau bien recu';
      $reste = $_POST['reste'];
      //echo 'reste: '.$reste;
    }
    
    if(isset($_POST['mode_paiement'])){
      //echo 'Bordereau bien recu';
      $mode_paiement = $_POST['mode_paiement'];
      //echo 'mode_paiement: '.$mode_paiement;
    }
    
    if(isset($_POST['date_paiement'])){
      //echo 'Bordereau bien recu';
      
      //echo 'Ant_date_paiement: '.$_POST['date_paiement'];
      if($_POST['date_paiement']=="")
        $date_paiement = null;
      else
        $date_paiement = date_format_db($_POST['date_paiement']);
      //echo 'date_paiement: '.$date_paiement;
    }else
        $dateentree = null; 

  //
  if(0 < $montant_percu && $montant_percu < $prix_total)
    $statut = "Incomplet";
  elseif($montant_percu==$prix_total)
    $statut = "Regle";
  elseif($montant_percu==0)
    $statut = "Impaye";
 
 
 
 
    /*echo 'numero_bordereau: '.$bordereau;
    echo 'numero_conteneur: '.$numero_conteneur;
    echo 'nom_client: '.$nom_client;
    echo 'numero_client: '.$numero_client;
    echo 'marque: '.$marque;
    echo 'nombre_colis: '.$nombre_colis;
    echo 'cubage: '.$cubage;
    echo 'dateembarquement: '.$dateembarquement;
    echo 'date_entree_magazin: '.$dateentree;
    echo 'prix_total: '.$prix_total;
    echo 'montant_percu: '.$montant_percu;
    echo 'reste: '.$reste;
    echo 'date_paiement: '.$date_paiement;
    echo 'mode_paiement: '.$mode_paiement;
    echo 'statut: '.$statut;*/
    
    /*$bordereau = "BORD_11";
    $numero_conteneur = "CONT_8";
    $nom_client = "Uriel";
    $numero_client = "699887766";
    $marque = "As";
    $nombre_colis = 2;
    $cubage = 15.3;
    $dateembarquement = "2022-02-14";
    $dateentree = "2022-02-14";
    $prix_total = 5000;
    $montant_percu = 1000;
    $reste = 4000;
    $date_paiement = "2022-02-14";
    $mode_paiement = "Especes";
    $statut = "Incomplet";*/
    
  /** Ecriture en BD */
try{
    $sql = "INSERT INTO bordereaux (numero_bordereau, numero_conteneur, nom_client, numero_client, marque, nombre_colis, cubage, date_embarquement, date_entree_magazin, prix_total, montant_percu, reste, date_paiement, mode_paiement, statut)
            VALUES(:numero_bordereau, :numero_conteneur, :nom_client, :numero_client, :marque, :nombre_colis, :cubage, :dateembarquement, :date_entree_magazin, :prix_total, :montant_percu, :reste, :date_paiement, :mode_paiement, :statut)";
    $prepared_sql = $db_conn->prepare($sql);
    $prepared_sql->bindValue(':numero_bordereau', $bordereau);
    $prepared_sql->bindValue(':numero_conteneur', $numero_conteneur);
    $prepared_sql->bindValue(':nom_client', $nom_client);
    $prepared_sql->bindValue(':numero_client', $numero_client);
    $prepared_sql->bindValue(':marque', $marque);
    $prepared_sql->bindValue(':nombre_colis', $nombre_colis);
    $prepared_sql->bindValue(':cubage', $cubage);
    $prepared_sql->bindValue(':dateembarquement', $dateembarquement);
    $prepared_sql->bindValue(':date_entree_magazin', $dateentree);
    $prepared_sql->bindValue(':prix_total', $prix_total);
    $prepared_sql->bindValue(':montant_percu', $montant_percu);
    $prepared_sql->bindValue(':reste', $reste);
    $prepared_sql->bindValue(':date_paiement', $date_paiement);
    $prepared_sql->bindValue(':mode_paiement', $mode_paiement);
    $prepared_sql->bindValue(':statut', $statut);
    $prepared_sql->execute();
    
    echo 'success';
}catch(EXCEPTION $e){
    echo $e->getMessage();//"failed";//.
}

   


    function date_format_db($date){
      $exp_date = explode('/', $date);//j-m-Y
      $db_date = $exp_date[2].'-'.$exp_date[1].'-'.$exp_date[0];//Y-m-d
      return $db_date;
    }

    
?>