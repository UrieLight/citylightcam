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
              <h3 class="box-title">Modifier un utilisateur</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="users_management.php" method="post">
              <div class="box-body">
                <!--//TODO: Changer les classes et les IDs-->
                <br/>
                
                <div class="form-group">
                  <input type="hidden" class="form-control" id="id_user_id" name="bd_user_id" placeholder="" value="<?= $_POST['bd_id_user']; ?>">
                </div>
                <br/>
                
                
                <div class="form-group">
                  <label for="id_login">Login</label>
                  <input type="text"  disabled class="form-control" id="id_login" name="login" placeholder="Entrez un nouvel identifiant de connexion" value="<?= $_POST['bd_user_login']; ?>">
                </div>
                <br/>
                
                <!--div class="form-group">
                  <label for="id_mot_de_passe">Nouveau mot de passe</label>
                  <input type="text" class="form-control" id="id_mot_de_passe" name="mot_de_passe" placeholder="Entrez un nouveau mot de passe" value="">
                </div>
                <br/>

                <div class="form-group">
                  <label for="id_mot_de_passe2">Confirmez le mot de passe</label>
                  <input type="phone" class="form-control" id="id_mot_de_passe2" name="mot_de_passe2" placeholder="Confirmez le nouveau mot de passe" value="">
                </div>
                <br/-->
                
                <div class="form-group">
                  <?php $old_user_role = $_POST['bd_user_fonction']; ?>
                  <input type="hidden"  disabled class="" id="id_old_user_role" name="" placeholder="" value="<?= $old_user_role; ?>">
                </div>
                
                
                <div class="form-group">
                  <label for="id_profil">Profil</label>
                  <select class="form-control" style="width: auto;" id="id_profil" name="user_profil">
                    <option value="reader" <?php if($old_user_role == "reader") echo "selected"; ?> >Reader</option>
                    <option value="editor" <?php if($old_user_role == "editor") echo "selected"; ?> >Editeur</option>
                    <option value="admin" <?php if($old_user_role == "admin") echo "selected"; ?> >Administrateur</option>
                  </select> 
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="id_update_user">Mettre à jour</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <div class="col-md-2">

        </div>
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
                
            $('#id_update_user').on('click', function(e){
            
                var user_id = $('#id_user_id').val();
                var old_fonction = $('#id_old_user_role').val();
                var new_fonction = $('#id_profil').val();
                
                
                
                if(old_fonction == new_fonction){
                    alert('Cette fonction est déjà configurée pour cette utilisateur.');
                    e.preventDefault();
                }
                else{
                    //alert('Données prêtes pour Enregistrement.');
                    $.ajax({
                    url: "../../database/update_user.php",
                    method: "POST",
                    data: {
                        "id": user_id,
                        "fonction": new_fonction
                    },
                    success:function (data) {
                    
                        ///console.log(data);
                        if(data=="success"){
                            alert('Mise à jour de la fonction réussie !');
                            window.location.assign('users_management.php');
                        }
                        else
                            alert('La mise à jour de la fonction a échoué.\nErreur: '+data);
                    
                    },
                        error: function(error) {
                            alert('Echec!\nCritical error: '+error);
                        }
                    });
            
                }
            });

        });
    </script>
</body>
</html>