
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2022 <a href="#https://absolutionsTech">Ab'solutionsTech</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- #1 deleted content of tabs control-->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<?php 
    if($page_name == "bordereaux" || $page_name == "edit_bord" || $page_name == "users_management" )
      echo'      
        <!-- DataTables -->
        <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>';  
  ?>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
  $(function () {

    //Date picker
    $('#dateentree, #datepaiement, #dateembarquement').datepicker({
      autoclose: true
    });

    $('#id_btn_deconnexion').on('click', function(){
      if(confirm('Voulez-vous fermer votre session ?'))
        window.location.assign('../../Auth/login.php');
      });
    });

  <?php 
    if($page_name == "bordereaux" || $page_name == "edit_bord" || $page_name == "users_management" )
      echo"
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : false,
          'ordering'    : true,
          'info'        : false,
          'autoWidth'   : true
        })
      })
      ";
  ?>
</script>

