


 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <?php 
          if($page_name == "enregistrement")
            echo'<li class="treeview active">';  
          else
            echo'<li class="treeview">';
        ?>

        <!--li class="treeview active"-->
          <a href="#">
            <i class="fa fa-edit"></i> <span>Formulaires</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="enregistrement.php"><i class="fa fa-circle-o"></i> Enregistrement</a></li>   
            <!--li><a href="advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="editors.html"><i class="fa fa-circle-o"></i> Editors</a></li-->
          </ul>
        </li>

        <?php 
          if($page_name == "statut_paiments")
            echo'<li class="treeview active">';  
          else
            echo'<li class="treeview">';
        ?>
        <!--li class="treeview"-->
          <a href="#">
            <i class="fa fa-table"></i> <span>Etats</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">         
            <li><a href="etats_paiement.php"><i class="fa fa-circle-o"></i> Status des Paiements</a></li>
          </ul>
        </li>
  </aside>