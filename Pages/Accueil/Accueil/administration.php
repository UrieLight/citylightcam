<?php
  session_start();

  if(empty($_SESSION) OR ((time()-$_SESSION['start'])>7200)){
        session_destroy();
        header("Location: ../../Auth/login.php");
  }
  
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
                          <div style="display:inline-block;" ><input type="number" min="0" class="form-control" id="id_montant_total" name="montant_total" placeholder="" value="" disabled></div>
                          <p style="display:inline-block;"> FCFA </p>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group">
                          <label for="id_percu">Versé</label> <br/>
                          <div style="display:inline-block;" ><input type="number" min="0" class="form-control" id="id_percu"  name="percu" placeholder="" value="0"></div>
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
            
            $('#id_percu').on('change', function(m){
                
                $reste_calc = $('#id_montant_total').val() - $('#id_percu').val();
                //console.log('Montant changed');
                if($reste_calc < 0)
                    alert('Le montant perçu ne peut être supérieur au prix du service.');
                else
                    $('#id_reste').val($reste_calc);
            });
                
                
            $('#id_enregistrer_bord').on('click', function(e){
            
                    
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
                var reste = montant_total-percu;//$('#id_reste').val();
                var mode_paiement = $('#id_mode_paiement').val();
                var date_paiement = $('#datepaiement').val();
                
                //console.log("cubage: "+cubage+" / date_embarquement: "+date_embarquement+" / reste: "+reste);
                //Véfications sur les valeurs entrées
                
                
                
                if(date_embarquement == ""){
                    alert('Veuillez inscrir la date d\'embarquement.');
                    e.preventDefault();
                }
                else if(bordereau == ""){
                    alert('Veuillez inscrir le numéro du bordereau.');
                    e.preventDefault();
                }
                else if(nom_client == ""){
                    alert('Veuillez inscrir le nom du client.');
                    e.preventDefault();
                }
                else if(num_client == ""){
                    alert('Veuillez inscrir le numéro du client.');
                    e.preventDefault();
                }
                else if(nom_marque == ""){
                    alert('Veuillez inscrir la marque du client.');
                    e.preventDefault();
                }
                else if(nbre_colis == ""){
                    alert('Veuillez inscrir le nombre de colis.');
                    e.preventDefault();
                }
                else if(num_conteneur == ""){
                    alert('Veuillez inscrir le numéro du conteneur.');
                    e.preventDefault();
                }
                else if(cubage == ""){
                    alert('Veuillez inscrir le cubage souscrit.');
                    e.preventDefault();
                }
                else if(montant_total == ""){
                    alert('Veuillez inscrir le montant total.');
                    e.preventDefault();
                }
                /*else if(percu == "")
                    alert('Veuillez inscrir la marque du client.');*/
                //else if(reste == "")
                //else if(mode_paiement == "")
                else if(percu >0 && date_paiement==""){
                    alert('Veuillez inscrir la date de perception du paiement.');
                    e.preventDefault();
                }
                else{
                    //alert('Données prêtes pour Enregistrement.');
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
                        if(data=="success"){
                            alert('Enregistrement réussi !');
                            window.location.assign('bordereaux.php');
                        }
                        else
                            alert('Echec d\'enregistrement.\nErreur: '+data);
                    
                    },
                        error: function(error) {
                            alert('Echec d\'enregistrement '+error);
                        }
                });
            
                }
                
                
            
                /*}else
                    alert('Remplissez tous les champs.');*/
    
            });
    
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
                
            $('#id_cubage').on('change', function(c){
                //console.log('Montant changed');
                var $prix_tot = $('#id_cubage').val() * 350000;
                //console.log('prix_tot:'+$prix_tot);
                $('#id_montant_total').val($prix_tot);
                
            });
    
            /*$('#id_montant_total').on('change', function(e){
                //console.log('Montant changed');
                $reste = $('#id_montant_total').val() - $('#id_percu').val();
                if($reste < 0)
                    alert('Le montant perçu ne peut être supérieur au prix du service.');
                else
                    $('#id_reste').val($reste);
            });*/

           

        });
    </script>


</body>
</html>