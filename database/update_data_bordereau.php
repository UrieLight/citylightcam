<?php
  include('db_connect.php');

  /** Reception des donnees du bordereau */

    if(isset($_POST['bd_id_bordereau'])){
      //echo 'Bordereau bien recu';
      $bd_id_bordereau = $_POST['bd_id_bordereau'];
      //echo 'bordereau: '.$bordereau;
    }

    /*if(isset($_POST['bordereau'])){
      //echo 'Bordereau bien recu';
      $bordereau = $_POST['bordereau'];
      //echo 'bordereau: '.$bordereau;
    }*/

    /*if(isset($_POST['dateentree'])){
      //echo 'Bordereau bien recu';
      $dateentree = date_format_db($_POST['dateentree']);
      //echo 'dateentree: '.$dateentree;
    }*/
    
    /*if(isset($_POST['nom_client'])){
      //echo 'Bordereau bien recu';
      $nom_client = $_POST['nom_client'];
      //echo 'nom_client: '.$nom_client;
    }*/
    
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
      $date_paiement = date_format_db($_POST['date_paiement']);
      //echo 'date_paiement: '.$date_paiement;
    } 

  //STATUS
    if(0 < $montant_percu && $montant_percu < $prix_total)
        $statut = "Incomplet";
    elseif($montant_percu==$prix_total)
        $statut = "Regle";
    elseif($montant_percu==0)
        $statut = "Impaye";
  
  /** Ecriture en BD */
    $sql = "UPDATE bordereaux 
            SET numero_conteneur=:numero_conteneur, 
                numero_client=:numero_client, 
                marque=:marque, 
                nombre_colis=:nombre_colis, 
                cubage=:cubage, 
                prix_total=:prix_total, 
                montant_percu=:montant_percu, 
                reste=:reste, 
                date_paiement=:date_paiement, 
                mode_paiement=:mode_paiement, 
                statut=:statut
            WHERE id_bordereau=:bd_id_bordereau
            ";
    $prepared_sql = $db_conn->prepare($sql);

    $prepared_sql->bindValue(':bd_id_bordereau', $bd_id_bordereau);
    $prepared_sql->bindValue(':numero_conteneur', $numero_conteneur);
    $prepared_sql->bindValue(':numero_client', $numero_client);
    $prepared_sql->bindValue(':marque', $marque);
    $prepared_sql->bindValue(':nombre_colis', $nombre_colis);
    $prepared_sql->bindValue(':cubage', $cubage);
    $prepared_sql->bindValue(':prix_total', $prix_total);
    $prepared_sql->bindValue(':montant_percu', $montant_percu);
    $prepared_sql->bindValue(':reste', $reste);
    $prepared_sql->bindValue(':date_paiement', $date_paiement);
    $prepared_sql->bindValue(':mode_paiement', $mode_paiement);
    $prepared_sql->bindValue(':statut', $statut);

    $prepared_sql->execute();

    echo 'Mise à jour terminée.';


    function date_format_db($date){
      $exp_date = explode('/', $date);//Y-m-d
      $db_date = $exp_date[2].'-'.$exp_date[1].'-'.$exp_date[0];
      return $db_date;
    }

    
?>