<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include_once("settings.php");
delete_cartProduct();
Update_Cart();
$single_total=null;
$value=1;
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
        <link href="css/style.css" rel='stylesheet' type='text/css' />

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<script src="js/jquery.min.js"></script>
		<!----start-alert-scroller---->
		<script type="text/javascript" src="js/jquery.easy-ticker.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#demo').hide();
			$('.vticker').easyTicker();
		});
		</script>
		<!----start-alert-scroller---->
		<!-- start menu -->
		<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src="js/megamenu.js"></script>
		<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
		<script src="js/menu_jquery.js"></script>
		<!-- //End menu -->
		<!---move-top-top---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		<!---//move-top-top---->
	</head>
	<body>
		<!---start-wrap---->
			<!---start-header---->
			<div class="header">
				<div class="top-header">
					<div class="wrap">
						<div class="top-header-left">
							<ul>
								<!---cart-tonggle-script---->
								<script type="text/javascript">
									$(function(){
									    var $cart = $('#cart');
									        $('#clickme').click(function(e) {
									         e.stopPropagation();
									       if ($cart.is(":hidden")) {
									           $cart.slideDown("slow");
									       } else {
									           $cart.slideUp("slow");
									       }
									    });
									    $(document.body).click(function () {
									       if ($cart.not(":hidden")) {
									           $cart.slideUp("slow");
									       } 
									    });
									    });
								</script>
								<!---//cart-tonggle-script---->
                                <li><a  href="index.php"> <span style="color:orangered">HOME </span></a></li>
							</ul>
						</div>
                        <div class="top-header-center">
							<div class="top-header-center-alert-left">
								<h3>FREE DELIVERY</h3>
							</div>
							<div class="top-header-center-alert-right">
								<div class="vticker">
								  <ul>
									  <li>Applies to orders of GH₵50 or more. <label>Returns are always free.</label></li>
								  </ul>
								</div>
							</div>
							<div class="clear"> </div>
						</div>
						<div class="top-header-right">
							<ul>
							<?php if(!isset($_SESSION["C_Email"])){
								echo "<li><a href='checkout.php'>Login</a><span> </span></li>";
							}else{
								echo "<li><a href='logout.php'>Logout</a><span> </span></li>";
							}
							  ?>
								<li><a href="checkout_signup.php">Signup</a><span> </span></li>
								<?php if(!isset($_SESSION["C_Email"])){
									echo "<li><a href='checkout_signup.php'>| Account</a><span> </span></li>";
								}else{
									echo "<li><a href='customer_account.php'>| Account</a><span> </span></li>";
								}?>
								
								<li><a style="color:yellow" href="cart.php">| Cart(<?php cart_total() ?>)</a></li>
							</ul>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				
				<!----//End-mid-head---->
				<!----start-bottom-header---->
				<div class="header-bottom">
                <div class="wrap">
					<!-- start header menu -->
							<ul class="megamenu skyblue">
                            <?php
							get_categories();
					  		?>
							</ul>
                     
         
	
		<section id="cart_items">
		<div  class="container">
		
			<div class="table-responsive cart_info">
				<table align="center" width="989" class="table table-condensed">
				   
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					
					<tbody>
					<?php			    
                        
						$total_price=0;
						global $conn;
						$ip_add=get_ip();
							if(isset($_POST["update_cart"])){			
								$quantity=$_POST["quantity"];
								$query="UPDATE cart SET quantity='$quantity'";
								mysqli_query($conn,$query);
								$_SESSION['quantity']=$quantity;
								$value=$_SESSION['quantity'];
								}
							
								
						$query="SELECT * FROM cart  WHERE  ip_address='$ip_add' ";
						$stmt=mysqli_query($conn,$query);
							$row_count=mysqli_num_rows($stmt);
						
					
						while($row=mysqli_fetch_array($stmt)){
							 $book_id=$row['book_id'];
							 $book_qyt=$row['quantity'];
					
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
					
							$price_values=array_sum($book_price );
					
								$total_price+=$price_values;
								$single_total=$single_price*$book_qyt;
					
						   echo" <tr>
							<td class='cart_product'>
							  <a href=''><img style='height:80px; width:80px;' src='adminpage/images/$book_image' alt=''></a>
							</td>
							<td class='cart_description'>
							  <h4><a href=''>$book_name</a></h4>
							</td>
							<td class='cart_price'>
							  <p>GH₵$single_price</p>
							</td>
							<td class='cart_quantity'>
							  <div class='cart_quantity_button'>
							   <a class='cart_quantity_up' href=''> + </a>
							   <a href='#?pr_id=$book_id'> <input class='cart_quantity_input' type='text' name='quantity' value='$book_qyt' autocomplete='off' size='2'></a>
								<a class='cart_quantity_down' href=''> - </a> 
							  </div>
							</td>
							<td class='cart_total'>
							  <p class='cart_total_price'>GH₵$single_total</p>
							</td>
							<td class='cart_delete'>
							
							  <a class='cart_quantity_delete' href='cart.php?book_id=$book_id'><i class='	glyphicon glyphicon-remove-sign'></i></a>
							</td>
						  </tr>";
						   
						  
						
						  
						  }
						   
						  
						   
						   
							
							
							}
						
						 
						$total_price;
							  
									?>	 
					
										</tbody>
				
					</tbody>
					
					<tr class="cart_menu" style='background:white;color:rgb(226, 10, 154); font-weight:bold; font-size:20px; '>
							<td > </td>
							<td ></td>
							<td>  </td>
							<td >  SUB TOTAL:  </td>
							<td ><?php price_total() ?></td>
							<td></td>
						</tr>
					
                         
						
						
						<tr class="cart_menu" style='background:white;color:black; font-weight:bold; font-size:15px; '>
							<br/>
							<br/>
							<td >    </td>
							<td ><a href=''><input class='btn btn-primary' type='submit' value='Update Cart' name='update_cart'/></a></td>
							<td ><a href="index.php"><input class='btn btn-primary' type='submit' value='Continue Shopping'/></a></td>
							<td ><a href="checkout.php"><input class='btn btn-primary' type='submit' value='Proceed To Checkout' name="checkout"/></a></td>
							<td></td>
						</tr>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

					</div>
				</div>
				</div>
			
     
		
		
	
	</body>
</html>

