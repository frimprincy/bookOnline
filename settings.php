<?php

include_once("database.php");



//getting categories and sub categerie

function get_categories(){

    global $conn;

    $get_categories="SELECT * FROM categories ";
    $run_cat=mysqli_query($conn,$get_categories);

    while($row=mysqli_fetch_array($run_cat)){

        $cat_name =$row["category_name"];
        $cat_id =$row["category_id"];
       
       
            echo"<li class='grid'><a  class='color2' href='cat_products.php?cat_id=$cat_id'>$cat_name</a>
           
            </li>";
     
    }
}

//getting books to home page
function get_home(){
    global $conn;

    $get_books="SELECT * FROM book_details  ORDER BY RAND() LIMIT 9";
    $run_books=mysqli_query($conn,$get_books);

    while($row=mysqli_fetch_array($run_books)){
        $book_name=$row["book_name"];
        $book_price=$row["book_price"];
        $image=$row["book_image"];
        $book_id=$row["book_id"];

        echo "<div onclick='location.href='' class='product-grid fade last-grid'>
        <div class='product-grid-head'>
            <ul class='grid-social'>
                <li><a class='facebook' href='#'><span> </span></a></li>
                <li><a class='twitter' href='#'><span> </span></a></li>
                <li><a class='googlep' href='#'><span> </span></a></li>
                <div class='clear'> </div>
            </ul>
           
        </div>
        <div class='product-pic''>
            <a href='index.php?cart=$book_id'><img style='width:240px; height:150px;' src='adminpage/images/$image' title='Click image to add to cart' /></a>
            <p>
            <span> $book_name</span>
          
            </p>
        </div>
        <div class='product-info''>
            <div class='product-info-cust'>
                <a href='details.php?book_id=$book_id'>Details</a>
            </div>
            <div class='product-info-price'>
                <a href='details.html'>GH₵$book_price</a>
            </div>
            <div class='clear'> </div>
        </div>
        <div class='more-product-info'>
            <span> </span>
        </div>
    </div>";
    }
}


//getting categories sub categories

function get_sub(){
    global $conn;
    if(isset($_GET["cat_id"])){
        $cat_id=$_GET["cat_id"];
      
        $get_cat="SELECT * FROM categories WHERE category_id='$cat_id'";
        $run_cat=mysqli_query($conn,$get_cat);
        $count_cat=mysqli_num_rows($run_cat);

        while($row=mysqli_fetch_array($run_cat)){
            $category_id=$row["category_id"];
            $category_name=$row["category_name"];

            $get_subcat="SELECT * FROM sub_categories WHERE cat_id='$category_id'";
            $run_subcat=mysqli_query($conn,$get_subcat);

            while($row=mysqli_fetch_array($run_subcat)){
                $sub_cat_name=$row["sub_cat_name"];
                $sub_cat_id=$row["sub_cat_id"];

                echo "<li><a href='cat_products.php?sub_id=$sub_cat_id'>$sub_cat_name</a></li>";
            }
        }
    }
}


//getting category title
function get_cat_title(){
    global $conn;
    if(isset($_GET["cat_id"])){
        $cat_id=$_GET["cat_id"];
      
        $get_cat="SELECT * FROM categories WHERE category_id='$cat_id'";
        $run_cat=mysqli_query($conn,$get_cat);
        $count_cat=mysqli_num_rows($run_cat);

        while($row=mysqli_fetch_array($run_cat)){
            $category_id=$row["category_id"];
            $category_name=$row["category_name"];

           echo "<h3 style='color:orangered; border:0.5px solid black; padding:5px; background-color:black;' >$category_name</h3>";

            
        }
    }
}


//get categories products

function get_cat(){
    global $conn;
    if(isset($_GET["cat_id"])){
        $cat_id=$_GET["cat_id"];
      
        $get_cat="SELECT * FROM categories WHERE category_id='$cat_id'";
        $run_cat=mysqli_query($conn,$get_cat);
        $count_cat=mysqli_num_rows($run_cat);

        while($row=mysqli_fetch_array($run_cat)){
            $category_id=$row["category_id"];
            $category_name=$row["category_name"];

            $get_books="SELECT * FROM book_details WHERE cat_id='$category_id ' ORDER BY RAND() LIMIT 15";
            $run_books=mysqli_query($conn,$get_books);

            while($row=mysqli_fetch_array($run_books)){
                  $book_name=$row["book_name"];
                 $book_price=$row["book_price"];
                 $image=$row["book_image"];
                 $book_id=$row["book_id"];

                
        echo "<div onclick='location.href='' class='product-grid fade last-grid'>
        <div class='product-grid-head'>
            <ul class='grid-social'>
                <li><a class='facebook' href='#'><span> </span></a></li>
                <li><a class='twitter' href='#'><span> </span></a></li>
                <li><a class='googlep' href='#'><span> </span></a></li>
                <div class='clear'> </div>
            </ul>
           
        </div>
        <div class='product-pic''>
            <a href='index.php?cart=$book_id'><img style='width:240px; height:150px;' src='adminpage/images/$image' title='Click Image to Add to Cart' /></a>
            <p>
            <span style='font-size:20px; margin-left:50; color:'orange'> $book_name</span>
          
            </p>
        </div>
        <div class='product-info''>
            <div class='product-info-cust'>
                <a href='details.php?book_id=$book_id''>Details</a>
            </div>
            <div class='product-info-price'>
                GH₵$book_price
            </div>
            <div class='clear'> </div>
        </div>
        <div class='more-product-info'>
            <span> </span>
        </div>
    </div>";
            }
        }
    }
}


//getting total category
function total_cat(){
    global $conn;
    if(isset($_GET["cat_id"])){
        $cat_id=$_GET["cat_id"];
      
        $get_cat="SELECT * FROM categories WHERE category_id='$cat_id'";
        $run_cat=mysqli_query($conn,$get_cat);
        $count_cat=mysqli_num_rows($run_cat);

        while($row=mysqli_fetch_array($run_cat)){
            $category_id=$row["category_id"];
            $category_name=$row["category_name"];

            $get_books="SELECT * FROM book_details WHERE cat_id='$category_id ' ORDER BY RAND() LIMIT 15";
            $run_books=mysqli_query($conn,$get_books);
            $row_count=mysqli_num_rows($run_books);

           echo $row_count;
        }
    }
}



//getting books by it sub_categories

function book_sub(){

    global  $conn;
    if(isset($_GET["sub_id"])){
        $sub_id=$_GET["sub_id"];

        $get_sub_cat="SELECT * FROM sub_categories WHERE sub_cat_id='$sub_id'";
        $run_sub_cat=mysqli_query($conn,$get_sub_cat);

        while($row=mysqli_fetch_array($run_sub_cat)){
            $sub_cat_id=$row["sub_cat_id"];

            $get_books="SELECT * FROM book_details WHERE sub_id='$sub_cat_id' ORDER BY RAND() LIMIT 15";
            $run_books=mysqli_query($conn,$get_books);
            $row_count=mysqli_num_rows($run_books);
         
            
            while($row=mysqli_fetch_array($run_books)){
                $book_name=$row["book_name"];
               $book_price=$row["book_price"];
               $image=$row["book_image"];
               $book_id=$row["book_id"];

               echo "<div onclick='location.href='' class='product-grid fade last-grid'>
               <div class='product-grid-head'>
                   <ul class='grid-social'>
                       <li><a class='facebook' href='#'><span> </span></a></li>
                       <li><a class='twitter' href='#'><span> </span></a></li>
                       <li><a class='googlep' href='#'><span> </span></a></li>
                       <div class='clear'> </div>
                   </ul>
                  
               </div>
               <div class='product-pic''>
                   <a href='index.php?cart=$book_id'><img style='width:240px; height:150px;' src='adminpage/images/$image' title='Click Image to Add to Cart' /></a>
                   <p>
                   <span> $book_name</span>
                 
                   </p>
               </div>
               <div class='product-info''>
                   <div class='product-info-cust'>
                       <a href='details.php?book_id=$book_id'>Details</a>
                   </div>
                   <div class='product-info-price'>
                       GH₵$book_price
                   </div>
                   
                   <div class='clear'> </div>
               </div>
               <div class='more-product-info'>
                   <span> </span>
               </div>
           </div>";

            }

        }
    }
}

//getting each total sub_category
function total_sub(){

    global  $conn;
    if(isset($_GET["sub_id"])){
        $sub_id=$_GET["sub_id"];

        $get_sub_cat="SELECT * FROM sub_categories WHERE sub_cat_id='$sub_id'";
        $run_sub_cat=mysqli_query($conn,$get_sub_cat);

        while($row=mysqli_fetch_array($run_sub_cat)){
            $sub_cat_id=$row["sub_cat_id"];

            $get_books="SELECT * FROM book_details WHERE sub_id='$sub_cat_id' ORDER BY RAND() LIMIT 15";
            $run_books=mysqli_query($conn,$get_books);
            $row_count=mysqli_num_rows($run_books);
         
            echo $row_count;
           

        }
    }
}
//get sub category menu

function get_sub_menu(){
    global $conn;
    if(isset($_GET["sub_id"])){
        $sub_cat_id=$_GET["sub_id"];
      
        $get_sub="SELECT * FROM sub_categories WHERE sub_cat_id='$sub_cat_id'";
        $run_sub=mysqli_query($conn,$get_sub);
        $count_sub=mysqli_num_rows($run_sub);

        while($row=mysqli_fetch_array($run_sub)){
            $sub_cat_id=$row["sub_cat_id"];
            $sub_cat_name=$row["sub_cat_name"];
            $cat_id=$row["cat_id"];


            $get_cat="SELECT * FROM categories WHERE category_id='$cat_id'";
            $run_cat=mysqli_query($conn,$get_cat);

            while($row=mysqli_fetch_array($run_cat)){
                $cat_name=$row["category_name"];
                $cat_id=$row["category_id"];

                $get_sub="SELECT * FROM sub_categories WHERE cat_id='$cat_id'";
                $run_sub=mysqli_query($conn,$get_sub);
               $count_sub=mysqli_num_rows($run_sub);

               while($row=mysqli_fetch_array($run_sub)){
                $sub_cat_name=$row["sub_cat_name"];
                $sub_cat_id=$row["sub_cat_id"];

                echo "<li><a href='cat_products.php?sub_id=$sub_cat_id'>$sub_cat_name</a></li>";

               }
            }
        }
    }
}

//getting book details
function get_details(){
    global $conn;
if(isset($_GET["book_id"])){
    $book_id=$_GET["book_id"];

 $get_book="SELECT * FROM book_details WHERE book_id='$book_id'";
 $run_book=mysqli_query($conn,$get_book);

 while($row=mysqli_fetch_array($run_book)){
    $book_name=$row["book_name"];
    $book_price=$row["book_price"];
    $image=$row["book_image"];
    $book_id=$row["book_id"];
    $pre_price=$row["previous_price"];
    $book_description=$row["book_description"];

    echo "<div class='details-left-slider'>
    <ul id='etalage'>
        <li>
            <a href='optionallink.html'>
                <img class='etalage_thumb_image' src='adminpage/images/$image' />
                <img class='etalage_source_image' src='adminpage/images/$image' />
            </a>
        </li>
        <li>
            <img class='etalage_thumb_image' src='adminpage/images/$image' />
            <img class='etalage_source_image' src='adminpage/images/$image' />
        </li>
        <li>
            <img class='etalage_thumb_image' src='adminpage/images/$image' />
            <img class='etalage_source_image' src='adminpage/images/$image' />
        </li>
        <li>
            <img class='etalage_thumb_image' src='adminpage/images/$image' />
            <img class='etalage_source_image' src='adminpage/images/$image' />
        </li>
        <li>
            <img class='etalage_thumb_image' src='adminpage/images/$image' />
            <img class='etalage_source_image' src='adminpage/images/$image' />
        </li>
        <li>
            <img class='etalage_thumb_image' src='adminpage/images/$image'/>
            <img class='etalage_source_image' src='adminpage/images/$image' />
        </li>
        <li>
            <img class='etalage_thumb_image' src='adminpage/images/$image' />
            <img class='etalage_source_image' src='adminpage/images/$image' />
        </li>
    </ul>
</div>
<div class='details-left-info'>
    <div class='details-right-head'>
    <h1>$book_name</h1>
    
    <p class='product-detail-info'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
    <a class='learn-more' href='#'><h3>MORE DETAILS</h3></a>
    <div class='product-more-details'>
        <ul class='price-avl'>
            <li class='price'><span>GH₵ $pre_price</span><label>GH₵ $book_price</label></li>
            <li class='stock'><i>In stock</i></li>
            <div class='clear'> </div>
        </ul>
        
        <ul class='prosuct-qty'>
            <span>Quantity:</span>
            <select>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
            </select>
        </ul>
       <a href='index.php?cart=$book_id'> <input type='button' value='add to cart' /></a>
        <ul class='product-share'>
            <h3>All so Share On</h3>
            <ul>
                <li><a class='share-face' href='#'><span> </span> </a></li>
                <li><a class='share-twitter' href='#'><span> </span> </a></li>
                <li><a class='share-google' href='#'><span> </span> </a></li>
                <li><a class='share-rss' href='#'><span> </span> </a></li>
                <div class='clear'> </div>
            </ul>
        </ul>
    </div>
</div>
</div>
<div class='clear'> </div>";

 }

}
}

//getting related books

function get_related_books(){
    global $conn;
if(isset($_GET["book_id"])){
    $book_id=$_GET["book_id"];

 $get_book="SELECT * FROM book_details WHERE book_id='$book_id'";
 $run_book=mysqli_query($conn,$get_book);

 while($row=mysqli_fetch_array($run_book)){
    $cat_id=$row["cat_id"];

    $get_catId="SELECT * FROM categories WHERE category_id='$cat_id'";
    $run_cat=mysqli_query($conn,$get_catId);


    while($row=mysqli_fetch_array($run_cat)){
        $category_id=$row["category_id"];

        $get_catBook="SELECT * FROM book_details WHERE cat_id='$category_id'";
        $run_catBook=mysqli_query($conn,$get_catBook);


        while($row=mysqli_fetch_array($run_catBook)){
            $book_name=$row["book_name"];
            $book_price=$row["book_price"];
            $image=$row["book_image"];
            $book_id=$row["book_id"];
            $pre_price=$row["previous_price"];
            $book_description=$row["book_description"];

            echo " <div class='item' onclick='location.href='details.html';'>
            <div class='product-grid fade sproduct-grid'>
                <div class='product-pic'>
                    <a href='index.php?card=$book_id'><img style='width:240px; height:150px;' src='adminpage/images/$image' title='click to book to cart' /></a>
                    <p>
                    <a href='#'> $book_name</a>
                   
                    </p>
                </div>
                <div class='product-info'>
                    <div class='product-info-cust''>
                        <a href='details.php?book_id=$book_id'>Details</a>
                    </div>
                    <div class='product-info-price'>
                        GH₵ $book_price
                    </div>
                    <div class='clear'> </div>
                </div>
                <div class='more-product-info'>
                    <span> </span>
                </div>
            </div>
        </div>";

        }
                         
        }
    }
 
     
    
 }
}



function get_ip(){

    $ip =$_SERVER['REMOTE_ADDR'];

    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
     $ip =$_SERVER['HTTP_CLIENT_IP'];

    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
     $ip =$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    
     return $ip; 

   }







    // checkout signup
    function checkout_signup(){
        if(isset($_POST["submit"])){
          $ip_add=get_ip();
          global $conn;
          $fname=$_POST["fname"];
          $lname=$_POST["surname"];
          $phone=$_POST["phone"];
          $cEmail=$_POST["email"];
          $city=$_POST["city"];
          $address=$_POST["address"];
          $pass=$_POST["pass"];
    
          $query="SELECT * FROM customers WHERE C_Email='$cEmail' OR pass='$pass' OR Phone_num=' $phone' ";
             $stmt =mysqli_query($conn,$query);
            $row_count=mysqli_num_rows($stmt);
          
           if($row_count>0){
            
            echo "<h5 style='color:red;'>User Email,password or Contact already exist!</h5>";
                
           }else{
    
           
            
             $query1 ="INSERT INTO customers(ip_address,fname,lastName,C_Email,city,customer_address,Phone_num,pass) VALUES('$ip_add','$fname','$lname','$cEmail','$city','$address','$phone','$pass')";
            $stmt= mysqli_query($conn,$query1);
              
            $cart_query="SELECT * FROM cart WHERE ip_address='$ip_add'";
            $get_cat =mysqli_query($conn,$cart_query);
            $cart_items=mysqli_num_rows($get_cat);


            if($cart_items==0){
                $_SESSION["fname"]=$fname;
                $_SESSION["C_Email"]=$cEmail;
                echo "<script> alert('Account have been created successfully!')</script>";
           
       
               }else{
                 $_SESSION["Customer_Email"]=$cEmail;
                 $_SESSION["fname"]=$fname;
                 echo "<script> alert('Account have been created successfully!')</script>";
                echo "<script> window.open('checkout.php','_self')</script>";
       
               }
               
             }
            }
    
         }



         //customer signup

         function checkout_signin(){
            global $conn;
              if(isset($_POST['signin_submit'])){
       
                 $C_email=$_POST["c_email"];
                 $C_pass=$_POST["c_password"];
                 
       
                 $select_cus="SELECT * FROM customers WHERE C_Email='$C_email' && 	pass='$C_pass'";
                 $run_cus=mysqli_query($conn,$select_cus);
                 $check_customer=mysqli_num_rows($run_cus);
                
                 
                
                 if($check_customer==0){
       
                   echo "<h5 style='color:red;'>Email or Password does not exist! </h5>";
                 }else{
                   $ip_add=get_ip();
       
                  $select_cat="SELECT * FROM cart WHERE ip_address='$ip_add'";
                  $run_cat=mysqli_query($conn,$select_cat);
                  $check_cat=mysqli_num_rows($run_cat);
       
                  if($check_customer>0 AND $check_cat==0){
       
                   $_SESSION["C_Email"]=$C_email;
                   echo "<script> alert('You have login successfully!')</script>";
                   echo "<script> window.open('payment.php','_self')</script>";
   
                     }else{
                       $_SESSION["C_Email"]=$C_email;
                       echo "<script> alert('You have login successfully!')</script>";
                       echo "<script> window.open('payment.php','_self')</script>";
                  }
       
                 }
                  
       
              }
       
       
         }


         //inserting products to cart
    function cart(){
        global $conn;
         
         if(isset($_GET['cart'])){
           $ip_add =get_ip();
           $book_id=$_GET['cart'];
           $query="SELECT * FROM cart  WHERE book_id='$book_id' AND ip_address='$ip_add' ";
           $stmt=mysqli_query($conn,$query);
           $row_count=mysqli_num_rows($stmt);
    
           if($row_count>0){
             echo "";
           } 
             $query1="INSERT INTO cart(book_id,ip_address,quantity) VALUES ('$book_id','$ip_add',1)";
             mysqli_query($conn,$query1);
             echo "<script>windows.open('index.php','_self')</script>";
             echo "<script> alert('You have add an item to cart!,You can go to cart to procceed payment')</script>";
           }
        
    
    
        }

         function price_total() {
            $total_price=0;
            global $conn;
            $ip_add=get_ip();
            $query=$query="SELECT * FROM cart  WHERE  ip_address='$ip_add' ";
            $stmt=mysqli_query($conn,$query);
            $row_count=mysqli_num_rows($stmt);
        
            while($row=mysqli_fetch_array($stmt)){
              $book_id=$row['book_id'];
              $qyt=$row['quantity'];
        
              $query1="SELECT * FROM book_details  WHERE  book_id='$book_id' ";
              $stmt1=mysqli_query($conn,$query1);
              $row_count=mysqli_num_rows($stmt1);
        
              while ($row1=mysqli_fetch_array($stmt1)) {
                $single_price=$row1["book_price"];
                $book_price =array($row1["book_price"]);
                $book_quantity =$row1["Quantity"];
                $book_des =$row1["book_description"];
                $book_image=$row1["book_image"];
                $book_status=$row1["book_status"];
                $add_date =$row1["add_date"];
                $book_id =$row1["book_id"];
                $book_name =$row1["book_name"];
        
                $price_values=array_sum( $book_price );
        
                $total_price+=$price_values;
        
                
              }
            }
        
            echo 'GH₵'.$total_price;
           }



           //delete cart product
           function delete_cartProduct() {
            $ip_add=get_ip();
            global $conn;
        
            if(isset($_GET['book_id'])){
        
              $book_id =$_GET['book_id'];
        
              $query="DELETE FROM cart WHERE book_id='$book_id' AND ip_address='$ip_add'";
              mysqli_query($conn,$query);
             
              echo "<script>windows.open('cart.php','_self')</script>";
             
              }
              
               
            }

            

            function cart_total(){
       
                global $conn;
                 
                 if(isset($_GET['add_cart'])){
                   $ip_add =get_ip();
                   $query="SELECT * FROM cart  WHERE  ip_address='$ip_add' ";
                   $stmt=mysqli_query($conn,$query);
                   $row_count=mysqli_num_rows($stmt);
            
                 }else{
                  $ip_add =get_ip();
                  $query="SELECT * FROM cart  WHERE  ip_address='$ip_add' ";
                  $stmt=mysqli_query($conn,$query);
                  $row_count=mysqli_num_rows($stmt);
                 }
            
                echo $row_count;
                }

//update quantity 
    function Update_Cart(){
    global $conn;
  
      
    if(isset($_POST["update_cart"])){
      $quantity=$_POST["quantity"];
 
      $query="UPDATE cart SET quantity='$quantity'";
      mysqli_query($conn,$query);
 
      
     
      
    }
    }
?>