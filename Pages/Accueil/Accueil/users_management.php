<?php
  session_start();

  if(empty($_SESSION) OR ((time()-$_SESSION['start'])>7200)){
        session_destroy();
        header("Location: ../../Auth/login.php");
  }
  
  include('../../database/db_connect.php');

  $page_name = "users_management";//pour gérer les options du side bar à afficher

  include('header.php');

  include('main_side_bar.php');
  
?>
  

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gestion des utilisateurs
                <!--small>Preview</small-->
            </h1>
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
                      <h3 class="box-title">Ajouter un utilisateur</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="" method="post">
                      <div class="box-body">
                        <!--//TODO: Changer les classes et les IDs-->
                        <br/>
                        
                        <div class="form-group">
                          <label for="id_login">Login</label>
                          <input type="text" class="form-control" id="id_login" name="login" placeholder="Entrez l'identifiant de connexion" value="">
                        </div>
                        <br/>
                        
                        <div class="form-group">
                          <label for="id_mot_de_passe">Mot de passe</label>
                          <input type="text" class="form-control" id="id_mot_de_passe" name="mot_de_passe" placeholder="Entrez le mot de passe" value="">
                        </div>
                        <br/>
        
                        <div class="form-group">
                          <label for="id_mot_de_passe2">Confirmez le mot de passe</label>
                          <input type="phone" class="form-control" id="id_mot_de_passe2" name="mot_de_passe2" placeholder="Confirmez le mot de passe" value="">
                        </div>
                        <br/>
        
                        <div class="form-group">
                          <label for="id_profil">Profil</label>
                          <select class="form-control" style="width: auto;" id="id_profil" name="user_profil">
                            <option value="reader">Standard</option>
                            <option value="editor">Editeur</option>
                            <option value="admin">Administrateur</option>
                          </select> 
                        </div>
        
                      </div>
                      <!-- /.box-body -->
        
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="id_enregistrer_user">Enregistrer</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
        
                </div>
                <div class="col-md-2">
        
                </div>
                <!--/.col (left) -->
    
            </div>
            
          
            </br>
            </br>
          
            <?php
                
                $sql = "SELECT * FROM users ";
                $prepared_sql = $db_conn->prepare($sql);
                $prepared_sql->execute();
                $row = $prepared_sql->fetchAll(PDO::FETCH_ASSOC);
            
            ?>
    
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <h3>
                    Liste des utilisateurs
                  </h3>
                  
                  <div class="box-body">
                      <table id="users_table" class="table table-bordered " style="background-color: white;">
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Login</th>
                          <th>Fonction</th>
                          <th>Action</th>
                        </tr>
                        
                        <style>
                            .btn_supprimer:hover{background-color: #FE5F55; color: white;}
                            
                            .btn_modifier:hover{background-color: #087CA7; color: white;}
                        </style>
                        <?php
                          $nbr = 0;
                          foreach($row as $user){
                              $nbr++;
                              echo '
                                <tr>
                                    <td>'.$nbr.'</td>
                                    <td>'.$user['login'].'</td>
                                    <td>'.$user['fonction'].'</td>
                                    <td>
                                        <form action="user_editing.php" method="post" class="form-group" >
                                            <input class="form-control" type="hidden" name="bd_id_user" value="'.$user['id'].'">
                                            <input class="form-control" type="hidden" name="bd_user_login" value="'.$user['login'].'">
                                            <input class="form-control" type="hidden" name="bd_user_fonction" value="'.$user['fonction'].'">
                                            <input class="form-control btn_modifier" type="submit" name="edit_user" value="Modifier ">
                                        </form>
                                        
                                        <a class="form-control btn_supprimer" href="#" id="'.$user['id'].'" value="'.$user['login'].'"> Supprimer</button>
                                        
                                    </td>
                                 </tr>';
                          }
                        ?>
                      </table>
                  </div>
                </div>
                
                <div class="col-md-1"></div>
            </div>
            <!-- /.row -->
        </section>
        
        
        <br/>
        <br/>
        <section class="content-header">
            <h1>
                Paramétrage ligne
                <!--small>Preview</small-->
            </h1>
        </section>
        
        <div class="row">
            <div class="col-md-3"></div>
            
            <?php
                $get_line_price_unit = "SELECT id, prix_unitaire FROM ligne ORDER BY date DESC LIMIT 1";
                $prepared_sql = $db_conn->prepare($get_line_price_unit);
                $prepared_sql->execute();
                
                $result = $prepared_sql->fetch(PDO::FETCH_ASSOC);
                
                $prix_unitaire = $result["prix_unitaire"];
                
            ?>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_prix_unitaire_ligne">Prix unitaire ligne :</label>
                    <input type="number" class="" id="id_prix_unitaire" name="id_prix_unitaire_ligne" placeholder="" value="<?= $prix_unitaire; ?>"> FCFA
                    <input type="submit" class="btn_update_prix_unitaire" id="<?= $result["id"]; ?>" value="Modifier">
                </div>
            </div>
            
            <div class="col-md-3"></div>
            <br/>
            <br/>
        
        </div>
        <!-- /.content -->
    </div>


<?php
  include('footer.php');
?>

    <script type="text/javascript">
        $(function(){            
                
            $('#id_enregistrer_user').on('click', function(e){
            
                    
                var login = $('#id_login').val();
                var mot_de_passe = $('#id_mot_de_passe').val();
                var mot_de_passe2 = $('#id_mot_de_passe2').val();
                var fonction = $('#id_profil').val();
                
                if(login == ""){
                    alert('Veuillez entrer un login.');
                    e.preventDefault();
                }
                else if(mot_de_passe == ""){
                    alert('Veuillez entrer le mot de passe.');
                    e.preventDefault();
                }
                else if(mot_de_passe.length < 8){
                    alert('Veuillez entrer un mot de passe d\'au moins 8 caractères.');
                    e.preventDefault();
                }
                else if(mot_de_passe2 == ""){
                    alert('Veuillez confirmer le mot de passe.');
                    e.preventDefault();
                }
                else if(mot_de_passe != mot_de_passe2){
                    alert('Les deux mots de passe sont différents.');
                    e.preventDefault();
                }
                else{
                    //alert('Données prêtes pour Enregistrement.');
                    $.ajax({
                    url: "../../database/enregistrement_new_user.php",
                    method: "POST",
                    data: {
                        "login": login,
                        "mot_de_passe": mot_de_passe,
                        "fonction": fonction
                    },
                    success:function (data) {
                    
                        ///console.log(data);
                        if(data=="success"){
                            alert('Enregistrement réussi !');
                            window.location.assign('users_management.php');
                        }
                        else
                            alert('Echec d\'enregistrement.\nErreur: '+data);
                    
                    },
                        error: function(error) {
                            alert('Echec d\'enregistrement '+error);
                        }
                    });
            
                }
            });
            
            
            $('.btn_supprimer').on('click', function(e){
                console.log($(this).attr("id"));
                
                var id_user_to_be_deleted = $(this).attr("id");
                
                var user_to_be_deleted = $(this).val();
                
                if(confirm('Voulez-vous vraiment supprimer le compte '+user_to_be_deleted+'  ?')){
                    
                    $.ajax({
                        url: "../../database/delete_user.php",
                        method: "POST",
                        data: {
                            "id": id_user_to_be_deleted
                        },
                        success:function (data) {
                        
                            ///console.log(data);
                            if(data=="success"){
                                alert('Suppression réussie !');
                                window.location.assign('users_management.php');
                            }
                            else
                                alert('Echec suppression.\nErreur: '+data);
                        
                        },
                        error: function(error) {
                            alert('Echec !\nCritical error: '+error);
                        }
                    });
                }
                
            });
            
            
            $('.btn_update_prix_unitaire').on('click', function(e){
                //var $id_prix_ligne = $(this).attr("id");
                var $prix_unitaire_ligne = $("#id_prix_unitaire").val();
                
                //console.log("id_prix: "+$id_prix_ligne+"\nPrix: "+$prix_unitaire_ligne);
                $.ajax({
                    url: "../../database/update_prix_unitaire_ligne.php",
                    method: "POST",
                    data: {
                        //"id": $id_prix_ligne,
                        "prix_unitaire": $prix_unitaire_ligne
                    },
                    success:function (data) {
                    
                        ///console.log(data);
                        if(data=="success"){
                            alert('Mise à jour du prix de la ligne réussie !');
                            window.location.assign('users_management.php');
                        }
                        else
                            alert('Echec mise à jour.\nErreur: '+data);
                    
                    },
                    error: function(error) {
                        alert('Echec !\nCritical error: '+error);
                    }
                });
            });

        });
    </script>
</body>
</html>