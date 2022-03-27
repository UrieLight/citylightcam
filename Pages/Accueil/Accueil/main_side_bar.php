 <?php
    session_start();
 ?>
 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Title Formulaires-->
        <?php 
          if($page_name == "enregistrement")
            echo'<li class="treeview active">';  
          else
            echo'<li class="treeview">';
        ?>

        <!-- Enregistrement -->
          <a href="#">
            <i class="fa fa-file-text-o"></i> <span>Formulaires</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="enregistrement.php"><i class="fa fa-plus-square-o"></i> Enregistrement</a></li>   
            <!--li><a href="advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="editors.html"><i class="fa fa-circle-o"></i> Editors</a></li-->
          </ul>
        </li>

        <!-- Title Etats -->
        <?php 
          if($page_name == "bordereaux")
            echo'<li class="treeview active">';  
          else
            echo'<li class="treeview">';
        ?>
        <!-- Borderaux -->
          <a href="#">
            <i class="fa fa-table"></i> <span>Etats</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">         
            <li><a href="bordereaux.php"><i class="fa fa-list"></i> Bordereaux</a></li>
          </ul>
        </li>
        
        <!-- Title Admin -->
        <?php
          //echo $_SESSION['userfunc'];
            if($_SESSION['userfunc'] == "editor"){
              
                if($page_name == "edit_bord" || $page_name == "users_management")
                    echo'<li class="treeview active">';
                else
                    echo'<li class="treeview">';
                
                echo '
                    <a href="#">
                        <i class="fa fa-gear"></i> <span>Admin</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                
                    <ul class="treeview-menu">         
                        <li><a href="edition_bordereaux.php"><i class="fa fa-edit"></i> Edition des bordereaux </a></li>
                    </ul>
                </li>';
            }
            
            if($_SESSION['userfunc'] == "admin"){
                 if($page_name == "edit_bord" || $page_name == "users_management")
                    echo'<li class="treeview active">';
                else
                    echo'<li class="treeview">';
                
                echo'
                    <a href="#">
                        <i class="fa fa-gear"></i> <span>Admin</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    
                    <ul class="treeview-menu">         
                        <li><a href="edition_bordereaux.php"><i class="fa fa-edit"></i> Edition des bordereaux </a></li>
                        <li><a href="users_management.php"><i class="fa fa-users"></i> Gestion des utilisateurs </a></li>
                    </ul>
                </li>';
          }
        ?>
        </ul>
        </section>
  </aside>