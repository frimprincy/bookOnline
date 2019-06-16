<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h5 style="color:green" > <?php AddSubCat(); ?></h5>
            <div class="btn-toolbar mb-2 mb-md-0">
                <form  method="POST">
                    <!-- Button trigger modal -->
                    <div  >
                    <button style="right:20px;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                            Add subCategory
                    </button>
                   </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Enter SubCategory Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- First name and last name -->
                            <form class="mb-5" method="POST">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" name="sub_name"class="form-control" placeholder="SubCategory name">
                                    </div>
                                    
                                </div>
                         
                            <!-- Email and Phone number -->
                            <br>
                            <hr>
                          
                                <div class="form-row">
                                    <div class="col">
                                       
                                        <div class="col-auto my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Product Subcategories ID</label>
                             <select class="custom-select mr-sm-2 form-control" name="catid" id="inlineFormCustomSelect">
                                  <option selected>Choose...</option>
                                  <?php  getCategories()   ?>
                             </select>
                              </div>
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="subCategory" class="btn btn-primary">Save SubCategory</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <div class="box">
            <div class="box-header">
              <h3 style="color: rgba(131, 86, 167, 0.856);"  class="box-title">View Sub Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Actions</th>
               
                  
                </tr>
                </thead>
                <tbody>
              <?php  getSubCat() ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Actions</th>
                 
                </tr>
                </tfoot>
              </table>
            </div>
  </div>
            <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- FastClick -->


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
</script
</body>