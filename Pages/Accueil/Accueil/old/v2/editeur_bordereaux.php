<?php
  $page_name = "editeur_bord";

  include('header.php');

  include('main_side_bar.php');

  if(isset($_POST['num_bord'])){
      //echo 'Num Bord received';
      $num_bord = $_POST['num_bord'];
  }
  
  if(isset($_POST['date_entree'])){
      //echo 'Num Bord received';
      $date_entree = $_POST['date_entree'];
  }
    
  if(isset($_POST['nom_client'])){
    $nom_client = $_POST['nom_client'];
  }
  
  if(isset($_POST['num_client'])){
    $num_client = $_POST['num_client'];
  }
  
  if(isset($_POST['nom_marque'])){
    $nom_marque = $_POST['nom_marque'];
  }
  
  if(isset($_POST['nbre_colis'])){
    $nbre_colis = $_POST['nbre_colis'];
  }
  
  if(isset($_POST['num_conteneur'])){
    $num_conteneur = $_POST['num_conteneur'];
  }
  
  if(isset($_POST['cubage'])){
    $cubage = $_POST['cubage'];
  }
  
  if(isset($_POST['montant_total'])){
    $montant_total = $_POST['montant_total'];
  }
  
  if(isset($_POST['percu'])){
    $percu = $_POST['percu'];
  }
  
  if(isset($_POST['reste'])){
    $reste = $_POST['reste'];
  }
  
  if(isset($_POST['mode_paiement'])){
    $mode_paiement = $_POST['mode_paiement'];
  }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edition
        <!--small>Preview</small-->
      </h1>
      <!--ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol-->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border" style="text-align: center;">
              <h3 class="box-title">Mise à jour du Borderaux N° <b><?= $num_bord; ?></b></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <!--//TODO: Changer les classes et les IDs-->
                <br/>

                <div class="form-group">
                  <label>Date  d'entrée au Magasin</label>

                  <div class=" col-md-6 input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" value="<?= $date_entree; ?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <br/>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Nom du Propriétaire</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrez le nom du propriétaire" value="<?= $nom_client; ?>">
                </div>
                <br/>

                <div class="form-group">
                  <label for="exampleInputPassword1">Numéro du Propriétaire</label>
                  <input type="phone" class="form-control" id="exampleInputPassword1" placeholder="Entrez le numéro du propriétaire" value="<?= $num_client; ?>">
                </div>
                <br/>

                <div class="form-group">
                  <label for="exampleInputPassword1">Marque</label>
                  <input type="text" class="form-control" id="id_nom_marque" placeholder="Entrez la marque" value="<?= $nom_marque; ?>">
                </div>
                <br/>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nombre de Colis</label>
                  <input type="number" min="0" style="width:25%;" class="form-control" id="id_nbre_colis" placeholder="" value="<?= $nbre_colis; ?>">
                </div>
                <br/>

                <div class="form-group">
                  <label for="exampleInputPassword1">Numéro du Conteneur</label>
                  <input type="text" class="form-control" id="id_num_conteneur" placeholder="Entrez le numéro du Conteneur" value="<?= $num_conteneur; ?>">               
                </div>
                <br/>

                <table>
                  <thead>
                    <tr>
                      <th class="col-md-4"></th>
                      <th class="col-md-4"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Cubage</label> <br/>
                          <div style="display:inline-block;" >
                            <input type="number" min="0" class="form-control" id="id_cubage" placeholder="" value="<?= $cubage; ?>">
                          </div>

                          <div style="display:inline-block;"> 
                            <p>Ligne(s)</p>                    
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Prix</label> <br/>
                          <div style="display:inline-block;" ><input type="number" min="0" class="form-control" id="id_montant_total" placeholder="" value="<?= $montant_total; ?>"></div>
                          <p style="display:inline-block;"> FCFA </p>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Versé</label> <br/>
                          <div style="display:inline-block;" ><input type="number" min="0" class="form-control" id="id_percu" placeholder="" value="<?= $percu; ?>"></div>
                          <p style="display:inline-block;"> FCFA </p>
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Reste à payer</label> <br/>
                          <div style="display:inline-block;" ><input type="number" min="0" class="form-control" id="id_reste" placeholder="" value="<?= $reste; ?>"></div>
                          <p style="display:inline-block;"> FCFA </p>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <br/>

                <div class="form-group">
                  <label for="exampleInputPassword1">Mode de paiement</label>
                  <select class="form-control" style="width: auto;">
                    <option value="Espèces">Espèces</option>
                    <option value="momo" selected>Mobile Money</option>
                    <option value="chèque">Chèque</option>
                    <option value="VirementB">Virement Bancaire</option>
                  </select> 
                </div>

                <!-- 
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">

                    <p class="help-block">Example block-level help text here.</p>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Check me out
                    </label>
                  </div>
                -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <div class="col-md-2"></div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php
  include('footer.php');
?>

</body>
</html>