
<?php include_once("settings.php")  ?>

<section  style="background-color:grey,margin-top:50">
        <section id="main-content" >
        <section class="wrapper" >
             <!-- Start Main Customers -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h5 style="color:green" > </h5>
            <div class="btn-toolbar mb-2 mb-md-0">
                <form  method="POST">
                    <!-- Button trigger modal -->
                    <div  >
                    <button style="right:20px;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                            Add Category
                    </button>
                   </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Enter Category </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form class="mb-5" method="POST">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" name="cat_name"class="form-control" placeholder="Category name">
                                    </div>
                                    
                                </div>
                         
                            <br>
                            <hr>
                          
                             
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="Category" class="btn btn-primary">Save SubCategory</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>

   
          
<div class="box">
<div class="box-header">
              <h3 class="box-title">Books Details </h3>
              <?php  catItem() ?>
            </div>
            <?php AddCat();   ?>
             
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category ID </th>
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 
                  <?php  getCat()  ?>
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
        