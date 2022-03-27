<?php
  $page_name = "statut_paiments";

  include('header.php');


  include('main_side_bar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Statut des paiements
        <!--small>("Non Payé": Avance=0; Incomplet: Avance>0; Réglé: Paiement terminé)</small-->
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
              <i>("Non Payé": Avance=0; Incomplet: Avance>0; Réglé: Paiement terminé)</i>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow:scroll;">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Nom propriétaire</th>
                  <th>Numéro propriétaire</th>
                  <th>Numéro conteneur</th>
                  <th>Cubage souscris (Ligne)</th>
                  <th>Date de sortie</th>
                  <th>Montant (FCFA)</th>
                  <th>Avance (FCFA)</th>
                  <th>Mode de paiment</th>
                  <th>Statut</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Patrick Mboma</td>
                  <td>+237699999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>11-01-2022</td>
                  <td>400000</td>
                  <td>250000</td>
                  <td>Espèces</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Nelson Mandela</td>
                  <td>+237679999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>65</td>
                  <td>10-12-2021</td>
                  <td>300000</td>
                  <td>0</td>
                  <td>Virement Bancaire</td>
                  <td>Non payé</td>
                </tr>
                <tr>
                  <td>Djofang Ibrahim</td>
                  <td>+237669999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>205</td>
                  <td>12-01-2022</td>
                  <td>700000</td>
                  <td>350000</td>
                  <td>Orange Money</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Paul Biya</td>
                  <td>+237233999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>09-11-2022</td>
                  <td>1300000</td>
                  <td>1300000</td>
                  <td>Virement Bancaire</td>
                  <td>Réglé</td>
                </tr>
                <tr>
                  <td>Patrick Mboma</td>
                  <td>+237699999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>11-01-2022</td>
                  <td>400000</td>
                  <td>0</td>
                  <td>Espèces</td>
                  <td>Non payé</td>
                </tr>
                <tr>
                  <td>Nelson Mandela</td>
                  <td>+237679999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>65</td>
                  <td>10-12-2021</td>
                  <td>300000</td>
                  <td>250000</td>
                  <td>Virement Bancaire</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Djofang Ibrahim</td>
                  <td>+237669999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>205</td>
                  <td>12-01-2022</td>
                  <td>700000</td>
                  <td>350000</td>
                  <td>Orange Money</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Paul Biya</td>
                  <td>+237233999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>09-11-2022</td>
                  <td>1300000</td>
                  <td>1300000</td>
                  <td>Virement Bancaire</td>
                  <td>Réglé</td>
                </tr>
                <tr>
                  <td>Patrick Mboma</td>
                  <td>+237699999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>11-01-2022</td>
                  <td>400000</td>
                  <td>250000</td>
                  <td>Espèces</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Nelson Mandela</td>
                  <td>+237679999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>65</td>
                  <td>10-12-2021</td>
                  <td>300000</td>
                  <td>250000</td>
                  <td>Virement Bancaire</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Djofang Ibrahim</td>
                  <td>+237669999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>205</td>
                  <td>12-01-2022</td>
                  <td>700000</td>
                  <td>350000</td>
                  <td>Orange Money</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Paul Biya</td>
                  <td>+237233999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>09-11-2022</td>
                  <td>1300000</td>
                  <td>1300000</td>
                  <td>Virement Bancaire</td>
                  <td>Réglé</td>
                </tr>
                <tr>
                  <td>Patrick Mboma</td>
                  <td>+237699999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>11-01-2022</td>
                  <td>400000</td>
                  <td>250000</td>
                  <td>Espèces</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Nelson Mandela</td>
                  <td>+237679999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>65</td>
                  <td>10-12-2021</td>
                  <td>300000</td>
                  <td>250000</td>
                  <td>Virement Bancaire</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Djofang Ibrahim</td>
                  <td>+237669999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>205</td>
                  <td>12-01-2022</td>
                  <td>700000</td>
                  <td>350000</td>
                  <td>Orange Money</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Paul Biya</td>
                  <td>+237233999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>09-11-2022</td>
                  <td>1300000</td>
                  <td>1300000</td>
                  <td>Virement Bancaire</td>
                  <td>Réglé</td>
                </tr>
                <tr>
                  <td>Patrick Mboma</td>
                  <td>+237699999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>11-01-2022</td>
                  <td>400000</td>
                  <td>250000</td>
                  <td>Espèces</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Nelson Mandela</td>
                  <td>+237679999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>65</td>
                  <td>10-12-2021</td>
                  <td>300000</td>
                  <td>250000</td>
                  <td>Virement Bancaire</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Djofang Ibrahim</td>
                  <td>+237669999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>205</td>
                  <td>12-01-2022</td>
                  <td>700000</td>
                  <td>350000</td>
                  <td>Orange Money</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Paul Biya</td>
                  <td>+237233999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>09-11-2022</td>
                  <td>1300000</td>
                  <td>1300000</td>
                  <td>Virement Bancaire</td>
                  <td>Réglé</td>
                </tr>
                <tr>
                  <td>Patrick Mboma</td>
                  <td>+237699999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>11-01-2022</td>
                  <td>400000</td>
                  <td>250000</td>
                  <td>Espèces</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Nelson Mandela</td>
                  <td>+237679999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>65</td>
                  <td>10-12-2021</td>
                  <td>300000</td>
                  <td>250000</td>
                  <td>Virement Bancaire</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Djofang Ibrahim</td>
                  <td>+237669999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>205</td>
                  <td>12-01-2022</td>
                  <td>700000</td>
                  <td>350000</td>
                  <td>Orange Money</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Paul Biya</td>
                  <td>+237233999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>09-11-2022</td>
                  <td>1300000</td>
                  <td>1300000</td>
                  <td>Virement Bancaire</td>
                  <td>Réglé</td>
                </tr>
                <tr>
                  <td>Patrick Mboma</td>
                  <td>+237699999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>11-01-2022</td>
                  <td>400000</td>
                  <td>250000</td>
                  <td>Espèces</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Nelson Mandela</td>
                  <td>+237679999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>65</td>
                  <td>10-12-2021</td>
                  <td>300000</td>
                  <td>250000</td>
                  <td>Virement Bancaire</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Djofang Ibrahim</td>
                  <td>+237669999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>205</td>
                  <td>12-01-2022</td>
                  <td>700000</td>
                  <td>350000</td>
                  <td>Orange Money</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Paul Biya</td>
                  <td>+237233999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>09-11-2022</td>
                  <td>1300000</td>
                  <td>1300000</td>
                  <td>Virement Bancaire</td>
                  <td>Réglé</td>
                </tr>
                <tr>
                  <td>Patrick Mboma</td>
                  <td>+237699999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
                  <td>11-01-2022</td>
                  <td>400000</td>
                  <td>250000</td>
                  <td>Espèces</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Nelson Mandela</td>
                  <td>+237679999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>65</td>
                  <td>10-12-2021</td>
                  <td>300000</td>
                  <td>250000</td>
                  <td>Virement Bancaire</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Djofang Ibrahim</td>
                  <td>+237669999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>205</td>
                  <td>12-01-2022</td>
                  <td>700000</td>
                  <td>350000</td>
                  <td>Orange Money</td>
                  <td>Incomplet</td>
                </tr>
                <tr>
                  <td>Paul Biya</td>
                  <td>+237233999999</td>
                  <td>FQMOIJ54FJIOF7</td>
                  <td>95</td>
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