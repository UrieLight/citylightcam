<?php
  include('database/db_connect.php');
  
  $page_name = "edit_bord";

  include('header.php');

  include('main_side_bar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mise à jour des bordereaux
        <br/>
        <br/><small><b>Filtres :</b></small>        
        <br/><small><i>- <b>Impayé</b>: Avance=0; <b>Incomplet</b>: Avance>0; <b>Réglé</b>: Paiement terminé</i></small>
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
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>Action</th>
                    <th>Numéro Bordereau</th>
                    <th>Numéro conteneur</th>
                    <th>Nom propriétaire</th>
                    <th>Numéro propriétaire</th>
                    <th>Cubage souscris (Ligne)</th>
                    <th>Date d'entrée</th>
                    <th>Date de sortie</th>
                    <th>Montant total (FCFA)</th>
                    <th>Avance (FCFA)</th>
                    <th>Mode de paiment</th>
                    <th>Statut</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        <form action="editeur_bordereaux.php" method="post" class="form-group" >
                            <input class="form-control" type="hidden" name="num_bord" value="FQMOIJ54FJIOF7">
                            <input class="form-control" type="hidden" name="date_entree" value="01/21/2022">
                            <input class="form-control" type="hidden" name="nom_client" value="Patrick Mboma">
                            <input class="form-control" type="hidden" name="num_client" value="+237669999999">
                            <input class="form-control" type="hidden" name="nom_marque" value="Chalette">
                            <input class="form-control" type="hidden" name="nbre_colis" value="22">
                            <input class="form-control" type="hidden" name="num_conteneur" value="FF9866519FG">
                            <input class="form-control" type="hidden" name="cubage" value="88">
                            <input class="form-control" type="hidden" name="montant_total" value="700000">
                            <input class="form-control" type="hidden" name="percu" value="3500000">
                            <input class="form-control" type="hidden" name="reste" value="350000">
                            <input class="form-control" type="hidden" name="mode_paiement" value="Orange Money">
                            <input class="form-control" type="submit" class="fa fa-edit" value="Editer" />
                        </form>
                    </td>
                    <td>333IJ54FJIOF7</td>
                    <td>1547898</td>
                    <td>Patrick Mboma</td>
                    <td>+237699999999</td>
                    <td>95</td>
                    <td>11-12-2021</td>
                    <td>11-01-2022</td>
                    <td>400000</td>
                    <td>250000</td>
                    <td>Espèces</td>
                    <td>Incomplet</td>
                  </tr>
                  <tr>
                    <td>
                        <form action="editeur_bordereaux.php" method="post" >
                            <input type="hidden" name="num_bord" value="FQMOIJ54FJIOF7">
                            <input type="hidden" name="date_entree" value="12/10/2022">
                            <input type="hidden" name="nom_client" value="Nelson Mandela">
                            <input type="hidden" name="num_client" value="+237669999999">
                            <input type="hidden" name="nom_marque" value="Chalette">
                            <input type="hidden" name="nbre_colis" value="22">
                            <input type="hidden" name="num_conteneur" value="FF9866519FG">
                            <input type="hidden" name="cubage" value="88">
                            <input type="hidden" name="montant_total" value="700000">
                            <input type="hidden" name="percu" value="3500000">
                            <input type="hidden" name="reste" value="350000">
                            <input type="hidden" name="mode_paiement" value="Orange Money">
                            <input type="submit" class="fa fa-edit" value="Editer" />
                        </form>
                    </td>
                    <td>6GEBFGSDFGDRG</td>
                    <td>1547898</td>
                    <td>Nelson Mandela</td>
                    <td>+237679999999</td>
                    <td>65</td>
                    <td>10-12-2021</td>
                    <td>10-12-2021</td>
                    <td>300000</td>
                    <td>0</td>
                    <td>Virement Bancaire</td>
                    <td>Non payé</td>
                  </tr>
                  <tr>
                    <td>
                        <form action="editeur_bordereaux.php" method="post" >
                            <input type="hidden" name="num_bord" value="FQMOIJ54FJIOF7">
                            <input type="hidden" name="date_entree" value="12/01/2022">
                            <input type="hidden" name="nom_client" value="Vincent Ibrahim">
                            <input type="hidden" name="num_client" value="+237669999999">
                            <input type="hidden" name="nom_marque" value="Chalette">
                            <input type="hidden" name="nbre_colis" value="22">
                            <input type="hidden" name="num_conteneur" value="FF9866519FG">
                            <input type="hidden" name="cubage" value="88">
                            <input type="hidden" name="montant_total" value="700000">
                            <input type="hidden" name="percu" value="3500000">
                            <input type="hidden" name="reste" value="350000">
                            <input type="hidden" name="mode_paiement" value="Orange Money">
                            <input type="submit" class="fa fa-edit" value="Editer" />
                        </form>
                    </td>
                    <td>MMM6455346G</td>
                    <td>9866519</td>
                    <td>Vincent Ibrahim</td>
                    <td>+237669999999</td>
                    <td>205</td>
                    <td>12-01-2022</td>
                    <td>12-01-2022</td>
                    <td>700000</td>
                    <td>350000</td>
                    <td>Orange Money</td>
                    <td>Incomplet</td>
                  </tr>
                  <tr>
                    <td>
                        <form action="editeur_bordereaux.php" method="post" >
                            <input type="hidden" name="num_bord" value="FQMOIJ54FJIOF7">
                            <input type="hidden" name="date_entree" value="09/11/2022">
                            <input type="hidden" name="nom_client" value="Paul Biya">
                            <input type="hidden" name="num_client" value="+237669999999">
                            <input type="hidden" name="nom_marque" value="Chalette">
                            <input type="hidden" name="nbre_colis" value="22">
                            <input type="hidden" name="num_conteneur" value="FF9866519FG">
                            <input type="hidden" name="cubage" value="88">
                            <input type="hidden" name="montant_total" value="700000">
                            <input type="hidden" name="percu" value="3500000">
                            <input type="hidden" name="reste" value="350000">
                            <input type="hidden" name="mode_paiement" value="Orange Money">
                            <input type="submit" class="fa fa-edit" value="Editer" />
                        </form>
                    </td>
                    <td>DDDD4455DD</td>
                    <td>898965552</td>
                    <td>Paul Biya</td>
                    <td>+237233999999</td>
                    <td>95</td>
                    <td>09-11-2022</td>
                    <td>09-11-2022</td>
                    <td>1300000</td>
                    <td>1300000</td>
                    <td>Virement Bancaire</td>
                    <td>Réglé</td>
                  </tr>
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
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