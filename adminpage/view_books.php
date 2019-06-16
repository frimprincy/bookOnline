<?php include_once("settings.php")   ?>


<div class="box">
            <div class="box-header">
              <h3 class="box-title">Books Details </h3>
               <?php bookItem()   ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Book ID </th>
                  <th>Book Name</th>
                  <th>Previous Price</th>
                  <th>Book Price</th>
                  <th>Quantity</th>
                  <th>Book Status</th>
                  <th>Book Image</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                 <?php getBooks()   ?>
               
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            
          </div>
      

          <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
        <script>
          $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
        

          