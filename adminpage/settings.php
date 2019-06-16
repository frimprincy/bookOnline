<?php
include_once("../database.php");

function get_cat(){
  
    global $conn;
 $query="select * from categories";

 $stm=mysqli_query($conn,$query);


 while($row=mysqli_fetch_array($stm)){

   $cat_id=$row['category_id'];
   $cat_name=$row['category_name'];


   echo "   <option>$cat_name</option>";

 }


}

function get_brand(){


  global $conn;
$query = "select * from brands";

$stm =mysqli_query($conn,$query);
$row_count =mysqli_num_rows($stm);
if($row_count< 1){
  echo "<li><a href='#'> <span class='pull-right'></span>No brand to display</a></li>";
 }else{

 

while($row =mysqli_fetch_array($stm)){
  $brand_id =$row['brand_id'];
  $brand_name=$row['brand_name'];
  
 
                
    echo " <option>$brand_name</option>";
              
   }
  }

}

function get_sub(){

global $conn;

$query="select * from sub_categories";

$stm= mysqli_query($conn,$query);

while($row=mysqli_fetch_array($stm)){

    $sub_cat_id =$row['sub_cat_id'];
    $sub_cat_name=$row['sub_cat_name'];
    
    
    echo "<option>$sub_cat_name</option>";


 }

}

function insert_products(){

  global $conn;

  if(isset($_POST["Insertbooks"])){

  $book_name=mysqli_real_escape_string($conn,$_POST["book_name"]);
  $book_price=mysqli_real_escape_string($conn,$_POST["book_price"]);
  $pre_price=mysqli_real_escape_string($conn,$_POST["pre_price"]);
  $book_quantity=mysqli_real_escape_string($conn,$_POST["quantity"]);
  $book_des=mysqli_real_escape_string($conn,$_POST["book_des"]);
  $book_cat=mysqli_real_escape_string($conn,$_POST["book_cat"]);
  $sub_cat=mysqli_real_escape_string($conn,$_POST["sub_cat"]);
  $book_brand=mysqli_real_escape_string($conn,$_POST["book_brand"]);
  $book_status=mysqli_real_escape_string($conn,$_POST["book_status"]);


  $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="./images/".$v3.$fnm;
   $dst1=$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

    $query="select category_id from categories where category_name = '$book_cat'";
     $stm =mysqli_query($conn,$query);

     while($row=mysqli_fetch_array($stm)){

     $book_cat=$row["category_id"];

     }
   
     $brand_query ="select brand_id from brands where brand_name='$book_brand'";
     $brand_stm =mysqli_query($conn,$brand_query);
     while($row=mysqli_fetch_array($brand_stm)){

      $book_brand=$row["brand_id"];

     }
    
     $sub_query ="select sub_cat_id from sub_categories where sub_cat_name='$sub_cat'";
     $sub_stm =mysqli_query($conn,$sub_query);
     while($row=mysqli_fetch_array($sub_stm)){

      $sub_cat=$row["sub_cat_id"];

     }


 $insertbook="INSERT INTO book_details(book_name,book_price,previous_price,Quantity,book_description,cat_id,sub_id,brand_id,book_status,book_image,add_date)
 VALUES('$book_name','$book_price','$pre_price','$book_quantity','$book_des','$book_cat','$sub_cat','$book_brand','$book_status','$dst1',now())";

  $run=mysqli_query($conn,$insertbook);

  if(!$run){

    echo "";
  }

    

  
}

}


function getBooks(){
  global $conn;

  $getBooks="SELECT * FROM book_details";
  $rubBooks=mysqli_query($conn,$getBooks);
  while($row=mysqli_fetch_array($rubBooks)){
    $book_id=$row['book_id'];
    $book_name=$row['book_name'];
    $book_price=$row['book_price'];
    $previous_price=$row['previous_price'];
    $Quantity=$row['book_id'];
    $book_status=$row['book_status'];
    $book_image=$row['book_image'];


    echo " <tr>
    <td>$book_id</td>
    <td> $book_name
    </td>
    <td> $previous_price</td>
    <td>  $book_price</td>
    <td>$Quantity</td>
    <td> $book_status</td>
    <td><img src='images/$book_image'  width='60' height='50' /></td>
    <td><a href='#?edit=$book_id' <button class='btn btn-primary btn-xs fa fa-pencil'></button></a>
    <a href='view_books.php?delete_book=$book_id'<button class='btn btn-danger btn-xs fa fa-trash-o'></a></button></td>

  </tr>";
  }

}


//delete book

function bookItem() {
 
  global $conn;

  if(isset($_GET['delete_book'])){

    $book_id =$_GET['delete_book'];

    $query="DELETE FROM book_details WHERE book_id='$book_id' ";
    $run_query=mysqli_query($conn,$query);


    echo "<script>windows.open('index.php?view_books'_self')</script>";
   
     
    if($run_query){
    
      echo " <div class='alert alert-success' role='alert'>
      book deleted successfully!
       </div>";
    }
    }
    
     
  }

//getting Categories


function getCategories(){
  global $conn;

  $getCategories="SELECT * FROM categories";
  $runCat=mysqli_query($conn,$getCategories);

  while($row=mysqli_fetch_array($runCat)){
    $catName=$row["category_name"];
    $catid=$row["category_id"];

    echo " <option value=$catid> $catid</option>";
  }
}

function getCat(){
  global $conn;

   $getCat="SELECT * FROM categories";
   $runCat=mysqli_query($conn,$getCat);

   while($row=mysqli_fetch_array($runCat)){
       $category_id=$row["category_id"];
       $category_name=$row["category_name"];

       echo " <td>$category_id</td>
       <td>$category_name</td>
      
        <td><a href='categories.php?edit=$category_id' <button class='btn btn-primary btn-xs fa fa-pencil'></button></a>
        <a href='categories.php?delete_cat=$category_id'<button class='btn btn-danger btn-xs fa fa-trash-o'></a></button></td>
        
     </tr>";
   }
}

//delete categories

function catItem() {
 
  global $conn;

  if(isset($_GET['delete_cat'])){

    $cat_id =$_GET['delete_cat'];

    $query="DELETE FROM categories WHERE category_id='$cat_id' ";
    $run_query=mysqli_query($conn,$query);


    echo "<script>windows.open('index.php?categories_books'_self')</script>";
   
     
    if($run_query){
    
      echo " <div class='alert alert-success' role='alert'>
      book deleted successfully!
       </div>";
    }
    }
    
     
  }



function AddCat(){
  global $conn;
  if(isset($_POST["Category"])){
     $cat_name=$_POST["cat_name"];
    
     
      $query="SELECT * FROM categories WHERE category_name='$cat_name'";
      $run=mysqli_query($conn,$query);
      $row_count=mysqli_num_rows($run);

      if($row_count>0){
         echo  " category already exist";
      }else{

     $saveCat="INSERT INTO categories(category_name)
     VALUES('$cat_name')";

     $runsaveCat=mysqli_query($conn,$saveCat);
     if( $runsaveCat){
       echo  " Category Added Succesfully";

     }else{
       echo " failed to Add";
     }

    }
  }

}



function getCustomers(){
  global $conn;

  $getCustomers="SELECT * FROM customers";
  $runCustomers=mysqli_query($conn,$getCustomers);

  while($row=mysqli_fetch_array($runCustomers)){
    $customer_id=$row["customer_id"];
    $fname=$row["fname"];
    $lname=$row["lastName"];
    $Customer_Email=$row["C_Email"];
    $city=$row["city"];
    $customer_address=$row["customer_address"];
    $Phone_num=$row["phone_num"];
    $pass=$row["pass"];
    

    echo  "  <tr>
    <td>$customer_id</td>
   <td>$fname</td>
   <td> $lname</td>
    <td>$Customer_Email</td>
    <td>$Customer_Email</td>
    <td> $city</td>
    <td>$Phone_num</td>
    <td>$pass</td>
   
    <td><a href='Subcategories.php?edit= $customer_id' <button class='btn btn-primary btn-xs fa fa-pencil'></button></a>
    <a href='Subcategories.php?delete= $customer_id'<button class='btn btn-danger btn-xs fa fa-trash-o'></a></button></td>
 </tr>";
  }
}



//
function AddSubCat(){
  global $conn;
  if(isset($_POST["subCategory"])){
     $sub_name=$_POST["sub_name"];
     $catid=$_POST["catid"];
     
      $query="SELECT * FROM sub_categories WHERE sub_cat_name='$sub_name'";
      $run=mysqli_query($conn,$query);
      $row_count=mysqli_num_rows($run);

      if($row_count>0){
         echo  "Sub category already exist";
      }else{

     $saveSub="INSERT INTO sub_categories(sub_cat_name,cat_id)
     VALUES('$sub_name','$catid')";

     $runsaveSub=mysqli_query($conn,$saveSub);
     if( $runsaveSub){
       echo  "Sub Category Added Succesfully";

     }else{
       echo " failed to Add";
     }

    }
  }

}



//getting Sub Categories

function getSubCat(){
  global $conn;

  $getSubCategories="SELECT * FROM sub_categories";
  $runCat=mysqli_query($conn,$getSubCategories);

  while($row=mysqli_fetch_array($runCat)){
    $subcatName=$row["sub_cat_name"];
    $subcatid=$row["sub_cat_id"];
    $cat_id=$row["cat_id"];

    echo "    <tr><td>$subcatid</td>
             <td> $subcatName</td>
             <td><a href='Subcategories.php?edit=$subcatid' <button class='btn btn-primary btn-xs fa fa-pencil'></button></a>
             <a href='Subcategories.php?delete=$subcatid'<button class='btn btn-danger btn-xs fa fa-trash-o'></a></button></td> ";
  }
}


//login Admin


function admin_signin(){
  global $conn;
    if(isset($_POST['signin_submit'])){

       $username=$_POST["username"];
       $C_pass=$_POST["password"];


       $select_admin="SELECT * FROM admin WHERE admin_email='$username' AND admin_pass='$C_pass'";
       $run_admin=mysqli_query($conn,$select_admin);
       $check_admin=mysqli_num_rows($run_admin);

       if($check_admin==0){

         echo "<h5 style='color:red;'>UserName or Password does not exist! </h5>";
       }else{
  

         $_SESSION["admin_email"]=$username;
         echo "<script> alert('You have login successfully!')</script>";
         echo "<script> window.open('index.php','_self')</script>";
          

       }
        

    }


}


//get Total books

function book_total(){
  global $conn;

  $query="SELECT * FROM book_details";
  $run_book=mysqli_query($conn,$query);
  $book_total=mysqli_num_rows($run_book);

  echo $book_total;
}
//total customers
function book_customers(){
  global $conn;

  $query="SELECT * FROM customers";
  $run_cus=mysqli_query($conn,$query);
  $cus_total=mysqli_num_rows($run_cus);

  echo $cus_total;
}


//total customers
function book_cat(){
  global $conn;

  $query="SELECT * FROM categories";
  $run_cat=mysqli_query($conn,$query);
  $cat_total=mysqli_num_rows($run_cat);

  echo $cat_total;
}
?>