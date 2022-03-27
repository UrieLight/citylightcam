  <?php
    session_start();
    
    if(empty($_SESSION) OR ((time()-$_SESSION['start'])>900))
        header("Location: ../../Auth/login.php");
        
    include('../../database/db_connect.php');

    $page_name = "edit_bord";

    include('header.php');

    include('main_side_bar.php');
    
    echo $_SESSION['username'];
    print_r($_SESSION);

  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mise à jour des bordereaux
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              
            </div>

            <?php
            
                $sql = "SELECT * FROM bordereaux ";
                $prepared_sql = $db_conn->prepare($sql);
                $prepared_sql->execute();
                $row = $prepared_sql->fetchAll(PDO::FETCH_ASSOC);
                
                if(count($row) != 0){
                    echo '
                    <div class="box-body" style="overflow: scroll;">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Update</th>
                                    <th>Statut</th>
                                    <th>Numéro Bordereau</th>
                                    <th>Numéro conteneur</th>
                                    <th>Nom Client</th>
                                    <th>Numéro du Client</th>
                                    <th>Marque</th>
                                    <th>Nombre de Colis</th>
                                    <th>Cubage souscris (Ligne)</th>
                                    <th>Date d\'entree magazin</th>
                                    <th>Prix total (FCFA)</th>
                                    <th>Montant Perçu (FCFA)</th>
                                    <th>Reste (FCFA)</th>
                                    <th>Date de paiment</th>
                                    <th>Mode de paiment</th>
                                </tr>
                            </thead>
                            <tbody>';
                                
                                foreach($row as $bordereau){
                                    $print_date_paiement="";
                                    if($bordereau['montant_percu'] != 0) $print_date_paiement = $bordereau['date_paiement'];
                                    echo '<tr>
                                        <td>
                                          <form action="editeur_bordereaux.php" method="post" class="form-group" >
                                              <input class="form-control" type="hidden" name="bd_id_bord" value="'.$bordereau['id_bordereau'].'">
                                              <input class="form-control" type="hidden" name="num_bord" value="'.$bordereau['numero_bordereau'].'">
                                              <input class="form-control" type="hidden" name="num_conteneur" value="'.$bordereau['numero_conteneur'].'">
                                              <input class="form-control" type="hidden" name="date_entree" value="'.$bordereau['date_entree_magazin'].'">
                                              <input class="form-control" type="hidden" name="nom_client" value="'.$bordereau['nom_client'].'">
                                              <input class="form-control" type="hidden" name="num_client" value="'.$bordereau['numero_client'].'">
                                              <input class="form-control" type="hidden" name="nom_marque" value="'.$bordereau['marque'].'">
                                              <input class="form-control" type="hidden" name="nbre_colis" value="'.$bordereau['nombre_colis'].'">
                                              <input class="form-control" type="hidden" name="cubage" value="'.$bordereau['cubage'].'">
                                              <input class="form-control" type="hidden" name="montant_total" value="'.$bordereau['prix_total'].'">
                                              <input class="form-control" type="hidden" name="percu" value="'.$bordereau['montant_percu'].'">
                                              <input class="form-control" type="hidden" name="reste" value="'.$bordereau['reste'].'">
                                              <input class="form-control" type="hidden" name="date_paiement" value="'.$print_date_paiement.'">
                                              <input class="form-control" type="hidden" name="mode_paiement" value="'.$bordereau['mode_paiement'].'">
                                              <input class="form-control" type="submit" class="fa fa-edit" value="Editer" />
                                          </form>
                                        </td>
                                        <td>'.$bordereau['statut'].'</td>
                                        <td>'.$bordereau['numero_bordereau'].'</td>
                                        <td>'.$bordereau['numero_conteneur'].'</td>
                                        <td>'.$bordereau['nom_client'].'</td>
                                        <td>'.$bordereau['numero_client'].'</td>
                                        <td>'.$bordereau['marque'].'</td>
                                        <td>'.$bordereau['nombre_colis'].'</td>
                                        <td>'.$bordereau['cubage'].'</td>
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
                                        echo'</tr>';
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