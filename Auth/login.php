<?php
  session_start();

  include('../database/db_connect.php');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../pages/Accueil/dalex.jpg" >
  <title>City Light | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-image: url('dalex_login_bckgrd4b.jpg');">
<div class="login-box">
  <div class="login-logo">
    <a href="#" style="background-color: black; color: white;"><b>City </b>Light</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Connectez-vous</p>

    <form action="" method="">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="id_login" name="login" placeholder="Login" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" autocomplete="on">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="id_password" name="password" placeholder="Password" value="<?php if(isset($_POST['user_pwd'])) echo $_POST['user_pwd']; ?>" autocomplete="on">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-8">
          <div id="id_pwd_incorrect" style="color: red;"></div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Se souvenir de moi
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id="id_btn_conxion" class="btn btn-primary btn-block btn-flat">Connexion</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links ->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
    
    $('#id_btn_conxion').on('click', function(){    
        var login = $('#id_login').val();
        var password = $('#id_password').val();
      
        if(login != "" && password != ""){//Verification de presence de valeurs dans les champs login et pwd
        
            /*if()*/
            $.ajax({
                url: '../database/auth_check.php',
                //url: '../pages/Accueil/test.php',
                method: "POST",
                data: {
                "username": login,
                "user_pwd": password
                },
                success:function (data) {
                
                    
                    
                    if(data == "OK"){
                        alert('Connexion reussie ! '+data);
                        window.location.assign('../pages/Accueil/bordereaux.php');
                    }else{
                        
                      $('#id_pwd_incorrect').text("Login ou mot de passe incorrect");
                      alert('Echec de connexion! '+data);
                    }
                
                },
                error: function(error) {
                  alert('Echec critique de connexion: '+error);
                  $('#id_pwd_incorrect').text("Erreur critique");
                }
            });
        }else
            alert("Entrer votre login et votre mot de passe!");
    });
    
  });
</script>


<?php 
    
    function auth_check(){
        //echo "Groove";
       /* $auth = false;
        
        $users_cred = array(
                        array("username"=>"Admin",
                                "passwd" => "wtkW4uH_tM)Z",
                                "function"=>"admin"),
                        array("username"=>"Cedric.Takenwa",
                                "passwd" => "T30CW7V]jPDp",
                                "function"=>"reader"),
                        array("username"=>"Gilbert.Tchinda",
                                "passwd" => "1=Pz6.WaLczY",
                                "function"=>"reader"),
                        array("username"=>"Celestin.Noupa",
                                "passwd" => "sa9EhN!@/DP7",
                                "function"=>"editor")
                    );
        $json_users_cred = json_encode($users_cred);
        
        $dec_json_users_cred = json_decode($json_users_cred, true);
        
        //var_dump($dec_json_users_cred);
        
        foreach($dec_json_users_cred as $user){
            //var_dump($users["username"]);
            if($login == $user['username'] && $pwd == $user['passwd']){
                    $auth = true;
                    //echo "Login: ".$login;
                    //echo "<br>Func: ".$user['function'];
                    break;
            }
            echo "<br><br>";
        }
        
        if($auth == true){
            echo "OK";
            //header("Location: pages/Accueil/bordereaux.php");
            //exit();
        }
        else
            echo 'NOK';*/
    }

?>
</body>
</html>