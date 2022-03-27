<?php
    session_start();
    
    $auth = false;
    
    if(isset($_POST['username']) && isset($_POST['user_pwd'])){
        
        $login = $_POST['username'];//"Admin";//
        $passwd = $_POST['user_pwd'];//"wtkW4uH_tM)Z";//
    
        $users_cred = array(
                        array("username"=>"Admin",
                                "passwd" => "wtkW4uH_tM)Z",
                                "function"=>"admin"),
                        array("username"=>"Cedric.Takenwa",
                                "passwd" => "T30CW7V]jPDp",
                                "function"=>"admin"),
                        array("username"=>"Gilbert.Tchinda",
                                "passwd" => "1=Pz6.WaLczY",
                                "function"=>"reader"),
                        array("username"=>"Celestin.Noupa",
                                "passwd" => "sa9EhN!@/DP7",
                                "function"=>"editor"),
                        array("username"=>"Merime.Piebeng",
                                "passwd" => "PiEb.ImE-22",
                                "function"=>"editor")
                    );
        $json_users_cred = json_encode($users_cred);
        
        //var_dump($json_users_cred);
        
        $dec_json_users_cred = json_decode($json_users_cred, true);
        
        //var_dump($dec_json_users_cred);
        
        foreach($dec_json_users_cred as $user){
            if($login == $user['username'] && $passwd == $user['passwd']){
                $auth = true;
                
                $_SESSION['username'] = $user['username'];
                $_SESSION['userfunc'] = $user['function'];
                $_SESSION['start'] = time();
                
                //print_r($_SESSION);
                break;
            }
        }
        
        if($auth == true){
            echo "OK";
            
            $connexion_logs = fopen("connexion_logs.txt", "a") or die("Unable to open file!");
            $username = "\nUser: ".$_SESSION['username']." get connected ".date("Y-m-d h+1:i:sa");
            fwrite($connexion_logs, $username);
            fclose($connexion_logs);
        }else
            echo "NOK";
    }
?>