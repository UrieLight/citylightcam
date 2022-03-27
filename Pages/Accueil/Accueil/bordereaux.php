<?php
  session_start();
    
    //print_r($_SESSION);
    if(empty($_SESSION) OR ((time()-$_SESSION['start'])>900))
        header("Location: ../../Auth/login.php");
        
  include('../../database/db_connect.php');

  $page_name = "bordereaux";

  include('header.php');

  include('main_side_bar.php');
?>
//TODO: lorsque le statut est "impaye" afficher du vide dans la cellule du mode de paiement [OK]
//Afficher un message lorsque la BD est vide. [OK]
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Statut des paiements des bordereaux
        <br/>
        <br/><small><b>Filtres :</b></small>        
        <br/><small><i>- <b>Impaye</b>: Avance=0; <b>Incomplet</b>: Avance>0; <b>Regle </b>: Paiement terminé</i></small>
        <br/><small><i>- Modes de paiements: <b>Espèces</b>; <b>Virement Bancaire</b>; <b>Mobile Money</b>; <b>Chèque</b></i></small>
      </h1>

      <!--ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol-->
    </section>
    <?php
        /*echo 'Session usr: '.$_SESSION['username'];
            echo '<br>Session usr_f: '.$_SESSION['user_func'];
        
            echo '<br>COOKIES usr_f: '.$_COOKIES['user_func'];
            echo '<br>COOKIES usr_f: '.$_COOKIES['user_func'];*/
        
      $sql = "SELECT * FROM bordereaux ";
      $prepared_sql = $db_conn->prepare($sql);
      $prepared_sql->execute();
      $row = $prepared_sql->fetchAll(PDO::FETCH_ASSOC);

      $nbre_paiement_ok =  $nbre_paiement_nok =  $nbre_paiement_incmp = $montant_total_ok = $montant_total_nok = $reste = 0;
      $montant_percu =  $paiement_nok =  $paiement_inc = 0;
      
      $nbre_de_lignes = count($row);
      
      if($nbre_de_lignes != 0 ){
        foreach($row as $bordereau){
          if($bordereau['statut'] == "Regle"){
            $nbre_paiement_ok++;
            $montant_percu += $bordereau['montant_percu'];
          }

          if($bordereau['statut'] == "Incomplet"){
            $nbre_paiement_incmp++;
            $montant_percu += $bordereau['montant_percu'];
            $reste += $bordereau['reste'];
          }

          if($bordereau['statut'] == "Impaye"){
            $nbre_paiement_nok++;
            $montant_total_nok += $bordereau['prix_total'];
          }
        }
      }
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Payés entièrement</span>
              <span class="info-box-number"><?= $nbre_paiement_ok; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: <?php echo ($nbre_paiement_ok/$nbre_de_lignes)*100; ?>%"></div>
              </div>

              <span class="progress-description">
                Perçu: <?= $montant_percu; ?> FCFA
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Non terminés</span>
              <span class="info-box-number"><?= $nbre_paiement_incmp; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: <?php echo ($nbre_paiement_incmp/$nbre_de_lignes)*100; ?>%"></div>
              </div>

              <span class="progress-description">
                Reste: <?= $reste; ?> FCFA
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Non Payés</span>
              <span class="info-box-number"><?= $nbre_paiement_nok; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: <?php echo ($nbre_paiement_nok/$nbre_de_lignes)*100; ?>%"></div>
              </div>

              <span class="progress-description">
                A payer: <?= $montant_total_nok; ?> FCFA
              </span>

            </div>
            <!-- /.info-box-content -->
          </div>
        </div> 

        
        <!--div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">RESUME</span>
              
              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>

              <span class="info-box-text">Total perçu: <b>4</b> FCFA</span>
              

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>

              <span class="info-box-text">Total Reste: <b>4</bs>FCFA</span>
              
            </div>
            <-- /.info-box-content ->
          </div>
        </div-->
      </div>

      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              
            </div>

            <?php
                // $sql = "SELECT * FROM bordereaux ";
                // $prepared_sql = $db_conn->prepare($sql);
                // $prepared_sql->execute();
                if(count($row) != 0 ){
                echo '
                <div class="box-body" style="overflow: scroll;">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Statut</th>
                                <th>Numéro Bordereau</th>
                                <th>Numéro conteneur</th>
                                <th>Nom Client</th>
                                <th>Numéro du Client</th>
                                <th>Marque</th>
                                <th>Nombre de Colis</th>
                                <th>Cubage souscris (Ligne)</th>
                                <th>Date d\'embarquement</th>
                                <th>Date d\'entree magazin</th>
                                <th>Prix total (FCFA)</th>
                                <th>Montant Perçu (FCFA)</th>
                                <th>Reste (FCFA)</th>
                                <th>Date de paiment</th>
                                <th>Mode de paiment</th>
                            </tr>
                        </thead>
                        <tbody>';
                            //$row = $prepared_sql->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $bordereau){
                                echo '<tr>
                                    <td>'.$bordereau['statut'].'</td>
                                    <td>'.$bordereau['numero_bordereau'].'</td>
                                    <td>'.$bordereau['numero_conteneur'].'</td>
                                    <td>'.$bordereau['nom_client'].'</td>
                                    <td>'.$bordereau['numero_client'].'</td>
                                    <td>'.$bordereau['marque'].'</td>
                                    <td>'.$bordereau['nombre_colis'].'</td>
                                    <td>'.$bordereau['cubage'].'</td>
                                    <td>'.$bordereau['date_embarquement'].'</td>
                                    <td>'.$bordereau['date_entree_magazin'].'</td>
                                    <td>'.$bordereau['prix_total'].'</td>
                                    <td>'.$bordereau['montant_percu'].'</td>';
                                    if($bordereau['reste']==$bordereau['prix_total']){
                                      echo '<td>--</td>
                                            <td>--</td>
                                            <td>--</td>';
                                    }else{
                                      echo '<td>'.$bordereau['reste'].'</td>
                                            <td>'.$bordereau['date_paiement'].'</td>
                                            <td>'.$bordereau['mode_paiement'].'</td>';
                                    }
                                    echo '</tr>';
                            }

                        echo '
                        </tbody>
                    </table>
                </div>';
                }else
                  echo '<div class="box-body">Aucun enregistrement trouve!</div>';
            ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->


<?php
  include('footer.php');
?>


</body>
</html>