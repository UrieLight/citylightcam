<?php
  session_start();
  
  if(empty($_SESSION) OR ((time()-$_SESSION['start'])>900))
        header("Location: ../../Auth/login.php");
        
  $page_name = "editeur_bord";

  include('header.php');

  include('main_side_bar.php');

  /** Test et initialisation des valeurs des champs */
    if(isset($_POST['bd_id_bord'])){
        //echo 'Num Bord received';
        $bd_id_bordereau = $_POST['bd_id_bord'];
    }

    if(isset($_POST['num_bord'])){
        //echo 'Num Bord received';
        $num_bord = $_POST['num_bord'];
    }
    
    if(isset($_POST['date_entree'])){
        //echo $_POST['date_entree'];
        $date_entree = date_format_db_to_normal($_POST['date_entree']);// $_POST['date_entree'];
        
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
    
    if(isset($_POST['date_paiement'])){
      //echo $_POST['date_paiement'];
      $date_paiement = date_format_db_to_normal($_POST['date_paiement']);//$_POST['date_paiement'];// 
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
        Edition de Bordereau
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
                  <input type="hidden" id="bd_id_bordereau" value="<?= $bd_id_bordereau ?>" />

                  <label>Date  d'entrée au Magasin</label>

                  <div class=" col-md-6 input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" disabled="true" id="dateentree" value="<?= $date_entree; ?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <br/>
                
                <div class="form-group">
                  <label for="id_nom_client">Nom du Client</label>
                  <input type="text" class="form-control" disabled="true" id="id_nom_client" placeholder="Entrez le nom du Client" value="<?= $nom_client; ?>">
                </div>
                <br/>

                <div class="form-group">
                  <label for="id_num_client">Numéro du Client</label>
                  <input type="phone" class="form-control" id="id_num_client" placeholder="Entrez le numéro du Client" value="<?= $num_client; ?>">
                </div>
                <br/>

                <div class="form-group">
                  <label for="id_nom_marque">Marque</label>
                  <input type="text" class="form-control" id="id_nom_marque" placeholder="Entrez la marque" value="<?= $nom_marque; ?>">
                </div>
                <br/>

                <div class="form-group">
                  <label for="id_nbre_colis">Nombre de Colis</label>
                  <input type="number" min="0" style="width:25%;" class="form-control" id="id_nbre_colis" placeholder="" value="<?= $nbre_colis; ?>">
                </div>
                <br/>

                <div class="form-group">
                  <label for="id_num_conteneur">Numéro du Conteneur</label>
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
                          <label for="id_cubage">Cubage</label> <br/>
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
                          <label for="id_montant_total">Prix</label> <br/>
                          <div style="display:inline-block;" ><input type="number" min="0" class="form-control" id="id_montant_total" placeholder="" value="<?= $montant_total; ?>"></div>
                          <p style="display:inline-block;"> FCFA </p>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group">
                          <label for="id_percu">Versé</label> <br/>
                          <div style="display:inline-block;" ><input type="number" min="0" class="form-control" id="id_percu" placeholder="" value="<?= $percu; ?>"></div>
                          <p style="display:inline-block;"> FCFA </p>
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <label for="id_reste">Reste à payer</label> <br/>
                          <div style="display:inline-block;" ><input type="number" disabled="true" min="0" class="form-control" id="id_reste" placeholder="" value="<?= $reste; ?>"></div>
                          <p style="display:inline-block;"> FCFA </p>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <br/>

                <div class="form-group">
                  <label>Date  de paiement</label>

                  <div class=" col-md-6 input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepaiement" name="date_paiement" value="<?= $date_paiement; ?>">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label for="id_mode_paiement">Mode de paiement</label>
                  <select id="id_mode_paiement" class="form-control" style="width: auto;">
                    <option value="Especes" <?php if($mode_paiement == "Espece") echo "selected"; ?> >Espèces</option>
                    <option value="momo" <?php if($mode_paiement == "momo") echo "selected"; ?>>Mobile Money</option>
                    <option value="cheque" <?php if($mode_paiement == "cheque") echo "selected"; ?>>Chèque</option>
                    <option value="VirementB" <?php if($mode_paiement == "VirementB") echo "selected"; ?>>Virement Bancaire</option>
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
                <button type="submit" class="btn btn-primary" id="id_updater_bord">Mettre à jour</button>
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

  function date_format_db_to_normal($date){
    $db_date = explode('-', $date);//Y-m-d
    $normal_date = $db_date[2].'/'.$db_date[1].'/'.$db_date[0];
    return $normal_date;
  }
?>

<script type="text/javascript">
    $(function(){
      
      /** Recuperation des valeurs */
      

      /** Verification des inputs */
      
      $('#id_updater_bord').on('click', function(e){

          if($('#id_num_client').val()==""){
            alert('Fournissez un numéro de téléphone du client.');
            e.preventDefault();
          }

          if($('#id_nom_marque').val()==""){
            alert('Fournissez la marque du client.');
            e.preventDefault();
          }

          if($('#id_nbre_colis').val()==""){
            alert('Fournissez le nombre de colis.');
            e.preventDefault();
          }

          if($('#id_num_conteneur').val()==""){
            alert('Fournissez le numéro du conteneur.');
            e.preventDefault();
          }
          
          if($('#id_cubage').val()==""){
            alert('Renseignez le cubage.');
            e.preventDefault();
          }
          
        
        //var dateentree = $('#dateentree').val();
        //console.log('Date entree: '+dateentree);
        
        var bd_id_bordereau = $('#bd_id_bordereau').val();
        var bordereau = $('#id_num_bordereau').val();
        var date_entree = $('#dateentree').val();
        var nom_client = $('#id_nom_client').val();
        var num_client = $('#id_num_client').val();
        var nom_marque = $('#id_nom_marque').val();
        var nbre_colis = $('#id_nbre_colis').val();
        var num_conteneur = $('#id_num_conteneur').val();
        var cubage = $('#id_cubage').val();
        var montant_total = $('#id_montant_total').val();
        var percu = $('#id_percu').val();
        var reste = $('#id_reste').val();
        var mode_paiement = $('#id_mode_paiement').val();
        var date_paiement = $('#datepaiement').val(); 
        //console.log(date_paiement);

        //if()
        $.ajax({
          url: '../../database/update_data_bordereau.php',
          method: "POST",
          data: {
            "bd_id_bordereau": bd_id_bordereau,
            "num_client": num_client,
            "nom_marque": nom_marque,
            "nbre_colis": nbre_colis,
            "num_conteneur": num_conteneur,
            "cubage": cubage,
            "montant_total": montant_total,
            "percu": percu,
            "reste": reste,
            "mode_paiement": mode_paiement,
            "date_paiement": date_paiement
          },
          success:function (data) {

            console.log(data);

            alert('Mise à jour du bordereau reussie !!');
            window.location.assign('edition_bordereaux.php');

          },
          error: function(error) {
              alert('Echec de mise à jour! '+error);
          }
        });
      });
      
      /** Manipulation du reste du paiement en fonction des changements du prix total et du montant percu */
        //Sur variation du montant total
        $('#id_montant_total').on('change', function(e){
          //console.log('Montant changed');
          $reste = $('#id_montant_total').val() - $('#id_percu').val();
          if($reste < 0)
            alert('Le montant perçu ne peut être supérieur au prix du service.');
          else
            $('#id_reste').val($reste);
        });

        //Sur variation du mont percu
        $('#id_percu').on('change', function(e){
          //console.log('Montant changed');
          $reste = $('#id_montant_total').val() - $('#id_percu').val();
          if($reste < 0)
            alert('Le montant perçu ne peut être supérieur au prix du service.');
          else
            $('#id_reste').val($reste);
        });

    });
  </script>


</body>
</html>