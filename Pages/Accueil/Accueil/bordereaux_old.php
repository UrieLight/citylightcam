<?php
  session_start();

  include('database/db_connect.php');

  $page_name = "bordereaux";

  include('header.php');

  include('main_side_bar.php');
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Statut des paiements des bordereaux
        <br/>
        <br/><small><b>Filtres :</b></small>        
        <br/><small><i>- <b>Impayé</b>: Avance=0; <b>Incomplet</b>: Avance>0; <b>OK</b>: Paiement terminé</i></small>
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
                                <th>Date d\'entree magazin</th>
                                <th>Prix total (FCFA)</th>
                                <th>Montant Perçu (FCFA)</th>
                                <th>Reste (FCFA)</th>
                                <th>Date de paiment</th>
                                <th>Mode de paiment</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $row = $prepared_sql->fetchAll(PDO::FETCH_ASSOC);
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
                                    <td>'.$bordereau['date_entree_magazin'].'</td>
                                    <td>'.$bordereau['prix_total'].'</td>
                                    <td>'.$bordereau['montant_percu'].'</td>
                                    <td>'.$bordereau['reste'].'</td>
                                    <td>'.$bordereau['date_paiement'].'</td>
                                    <td>'.$bordereau['mode_paiement'].'</td>
                                </tr>';
                            }

                        echo '
                        </tbody>
                    </table>
                </div>';
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