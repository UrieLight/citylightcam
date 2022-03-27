<?php
  session_start();

  if(empty($_SESSION) OR ((time()-$_SESSION['start'])>1800))
        header("Location: ../../Auth/login.php");
  
  include('../../database/db_connect.php');

  $page_name = "enregistrement";//pour gérer les options du side bar à afficher

  include('header.php');

  include('main_side_bar.php');
  
  //TODO: Validation des donnees, date paiement ne doit pas etre inf a dateentree au magazin
?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Enregistrement
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
              <h3 class="box-title">Formulaire d'enregistrement</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="enregistrement.php" method="post">
              <div class="box-body">
                <!--//TODO: Changer les classes et les IDs-->
                <br/>
                
                <div class="form-group">
                  <label>Date  d'embarquement</label>

                  <div class=" col-md-6 input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="dateembarquement" name="dateembarquement" value="">
                  </div>
                  <!-- /.input group -->
                </div>
                <br/>

                <div class="form-group">
                  <label>Date  d'entrée au Magasin</label>

                  <div class=" col-md-6 input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="dateentree" name="date_entree" value="">
                  </div>
                  <!-- /.input group -->
                </div>
                <br/>

                <div class="form-group">
                  <label for="exampleInputText1">Numéro du Bordereau</label>
                  <input type="text" class="form-control" id="id_num_bordereau" name="num_bordereau" placeholder="Entrez le numéro du Bordereau" value="">
                </div>
                <br/>
                
                <div class="form-group">
                  <label for="id_nom_client">Nom du Client</label>
                  <input type="text" class="form-control" id="id_nom_client" name="nom_client" placeholder="Entrez le nom du Client" value="">
                </div>
                <br/>

                <div class="form-group">
                  <label for="id_num_client">Numéro du Client</label>
                  <input type="phone" class="form-control" id="id_num_client" name="num_client" placeholder="Entrez le numéro de téléphone du Client" value="">
                </div>
                <br/>

                <div class="form-group">
                  <label for="id_nom_marque">Marque</label>
                  <input type="text" class="form-control" id="id_nom_marque" name="nom_marque" placeholder="Entrez la marque du client" value="">
                </div>
                <br/>

                <div class="form-group">
                  <label for="id_nbre_colis">Nombre de Colis</label>
                  <input type="number" min="1" style="width:25%;" class="form-control" id="id_nbre_colis" name="nbre_colis" placeholder="" value="">
                </div>
                <br/>

                <div class="form-group">
                  <label for="id_num_conteneur">Numéro du Conteneur</label>
                  <input type="text" class="form-control" id="id_num_conteneur" name="num_conteneur" placeholder="Entrez le numéro du Conteneur" value="">               
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
                            <input type="number" min="0" step="any" class="form-control" id="id_cubage" name="cubage" placeholder="" value="">
                          </div>

                          <div style="display:inline-block;"> 
                            <p>Ligne(s)</p>                    
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <label for="id_montant_total">Prix</label> <br/>
                          <div style="display:inline-block;" ><input type="number" min="0" class="form-control" id="id_montant_total" name="montant_total" placeholder="" value=""></div>
                          <p style="display:inline-block;"> FCFA </p>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group">
                          <label for="id_percu">Versé</label> <br/>
                          <div style="display:inline-block;" ><input type="number" min="0" class="form-control" id="id_percu"  name="percu" placeholder="" value=""></div>
                          <p style="display:inline-block;"> FCFA </p>
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <label for="id_reste" id="id_label_reste">Reste à payer</label> <br/>
                          <div style="display:inline-block;" ><input type="number" min="0" class="form-control" id="id_reste" name="reste" placeholder="" value="" disabled></div>
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
                    <input type="text" class="form-control pull-right" id="datepaiement" name="date_paiement" value="">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Mode de paiement</label>
                  <select class="form-control" style="width: auto;" id="id_mode_paiement" name="mode_paiement">
                    <option value="Especes">Espèces</option>
                    <option value="momo">Mobile Money</option>
                    <option value="cheque">Cheque</option>
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
                <button type="submit" class="btn btn-primary" id="id_enregistrer_bord">Enregistrer</button>
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

    <script type="text/javascript">
        $(function(){
          
          /** Recuperation des valeurs */
          
    
          /** Verification des inputs */
          
        $('#id_enregistrer_bord').on('click', function(e){
            /*
              console.log('Hi');
              if($('#dateentree').val()==""){
                alert('Fournissez une date d\'entree au magazin.');
                e.preventDefault();
              }
    
              if($('#id_num_bordereau').val()==""){
                alert('Fournissez un numero de Bordereau.');
                e.preventDefault();
              }
    
              if($('#id_nom_client').val()==""){
                alert('Fournissez le nom du client.');
                e.preventDefault();
              }
    
              if($('#id_num_client').val()==""){
                alert('Fournissez un numéro de téléphone du client.');
                e.preventDefault();
              }
    
              if($('#id_num_client').val()==""){
                alert('Fournissez un numéro de téléphone du client.');
                e.preventDefault();
              }
    
              if($('#id_num_client').val()==""){
                alert('Fournissez un numéro de téléphone du client.');
                e.preventDefault();
              }
    
              if($('#id_num_client').val()==""){
                alert('Fournissez un numéro de téléphone du client.');
                e.preventDefault();
              }
            */
            //var dateentree = $('#dateentree').val();
            //console.log('Date entree: '+dateentree);
            
                
                var bordereau = $('#id_num_bordereau').val();
                var date_embarquement = $('#dateembarquement').val();
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
            
            //console.log("cubage: "+cubage+" / date_embarquement: "+date_embarquement+" / reste: "+reste);
            
            /*if(bordereau != "" AND date_embarquement != "" AND date_entree != "" AND nom_client != "" AND num_client != "" AND nom_marque != "" AND nbre_colis != "" AND num_conteneur != "" AND cubage != "" AND montant_total != "" AND percu != "" AND reste != "" AND mode_paiement != "" AND date_paiement != ""){*/
            
                $.ajax({
                    url: "../../database/traitement_data_enregistrement.php",
                    method: "POST",
                    data: {
                        "bordereau": bordereau,
                        "dateembarquement": date_embarquement,
                        "dateentree": date_entree,
                        "nom_client": nom_client,
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
                    
                    alert('Enregistrement réussi !!');
                    
                    },
                        error: function(error) {
                            alert('Echec d\'enregistrement '+error);
                        }
                });
            
            /*}else
                alert('Remplissez tous les champs.');
    
        });*/
    
          /*$('#id_enregistrer_bord').on('click', function(e){
            
            $date_entree = $('#datepicker').val();
            $num_bordereau = $('#id_num_bordereau').val();
            $nom_client = $('#id_nom_client').val();
            $num_client = $('#id_num_client').val();
            $nom_marque = $('#id_nom_marque').val();
            $nbre_colis = $('#id_nbre_colis').val();
            $num_conteneur = $('#id_num_conteneur').val();
            $cubage = $('#id_cubage').val();
            $montant_total = $('#id_montant_total').val();
            $avance = $('#id_avance').val();
            $reste = $('#id_reste').val();
            $mode_paiement = $('#id_mode_paiement').val();
    
            $obj_bordereau = {
              "Numero_bordereau": $num_bordereau,
              "date_entree": $date_entree,
              "client": [{
                "nom":$nom_client,
                "num":$num_client
              }],
              "nom_marque": $nom_marque,
              "nbre_colis": $nbre_colis,
              "num_conteneur": $num_conteneur,
              "cubage": $cubage,
              "paiement":[{
                "montant_total": $montant_total,
                "avance": $avance,
                "reste": $reste,
                "mode_paiement": $mode_paiement,
                "statut": false
              }]
            };
    
            console.log("Results: "+$obj_bordereau);
            e.preventDefault();
          });*/
          
          /** Manipulation du reste du paiement en fonction des changements du prix total et du montant percu */
            //Sur variation du montant total
        //var prix_unitaire_ligne = 350000;
            
        $('#id_cubage').on('change', function(e){
            //console.log('Montant changed');
            var $prix_tot = $('#id_cubage').val() * 350000;
            $('#id_montant_total').val($prix_tot);
            
        });

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