<?php include_once("settings.php"); ?>
        
            <div class="form-panel" style="margin-top:10px;">
            <h4 class="mb"><i class="fa fa-angle-right"></i>Add Books</h4>
            <span><?php insert_products();  ?></span>
            <form class="form-horizontal" method="POST" action="index.php?add_books" enctype="multipart/form-data">
             
            <div class="form-group">
            <label for="Pname" class="col-sm-2 col-sm-2 control-label">Upload Image:</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new" style="width: 200px; height: 150px;">
                        <img src=" " alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="width: 200px; height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                          <input type="file" name="pimage">
                        </span>
                        <a href="" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
           
            <div class="form-group">
                  <label for="Pname" class="col-sm-2 col-sm-2 control-label">Product Name:</label>
                  <div class="col-sm-6">
                    <input type="text" id="Pname" name="book_name"class="form-control"  required>
                  </div>
            </div>

            <div class="form-group">
                  <label for="price" class="col-sm-2 col-sm-2 control-label">Previous Price:</label>
                  <div class="col-sm-6">
                    <input type="text" id="price" name="pre_price"class="form-control" required >
                  </div>
            </div>
             
            <div class="form-group">
                  <label for="price" class="col-sm-2 col-sm-2 control-label">Original Price:</label>
                  <div class="col-sm-6">
                    <input type="text" id="price" name="book_price"class="form-control" required >
                  </div>
            </div>
            
            <div class="form-group">
                  <label for="quantity" class="col-sm-2 col-sm-2 control-label"> Quantity:</label>
                  <div class="col-sm-6">
                    <input type="text" id="quantity" name="quantity"class="form-control" required >
                  </div>
            </div>

           
               
            <div class="form-group">
                  <label for="des" class="col-sm-2 col-sm-2 control-label">Description:</label>
                  <div class="col-sm-6">
                    <input type="text" id="des" name="book_des"class="form-control"  required>
                  </div>
            </div>
             
                 
            <div class="form-group">
                  <label for="cat" class="col-sm-2 col-sm-2 control-label">Category Name:</label>
                  <div class="col-sm-6">
                  <select class="form-control" id="cat" name="book_cat" required>
                     <option> </option>
                        <?php get_cat(); ?>
                        
                        
                  </select>
                  </div>
            </div>
          

         
                 
                 <div class="form-group">
                  <label for="sub" class="col-sm-2 col-sm-2 control-label">Sub Category:</label>
                  <div class="col-sm-6">
                  <select class="form-control" id="sub" name="sub_cat" required>
                  <option> </option>
                        <?php get_sub(); ?>
                        
                        
                  </select>
                  </div>
            </div>

              <div class="form-group">
                  <label for="brand" class="col-sm-2 col-sm-2 control-label">brand:</label>
                  <div class="col-sm-6">
                  <select class="form-control" id="brand" name="book_brand" >
                        <option> </option>
                         <?php get_brand();?>
                        
                        
                  </select>
                  </div>
            </div>

            <div class="form-group">
                  <label for="stat" class="col-sm-2 col-sm-2 control-label">Status:</label>
                  <div class="col-sm-6">
                  <select class="form-control" id="stat" name="book_status" required>
                        <option> </option>
                        <option>Yes</option>
                        <option>No</option>
                        
                  </select>
                  </div>
            
               <div class="col-sm-6">
                  <input type="submit" value="insert Product" class="btn btn-theme start fa fa-arrow-down" name="Insertbooks" style="margin-top:20px; margin-left:100px;" />

                </div>
            
           
            </div>
            </form>
            </div>
          
         

    