<?php
include_once("settings.php");
cart();
session_start()
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>bookHouse</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<!----start-alert-scroller---->
		<script src="js/jquery.min.js"></script>
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
		<!---slider---->
		<link rel="stylesheet" href="css/slippry.css">
		<script src="js/jquery-ui.js" type="text/javascript"></script>
		<script src="js/scripts-f0e4e0c2.js" type="text/javascript"></script>
		<script>
			  jQuery('#jquery-demo').slippry({
			  // general elements & wrapper
			  slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
			  // options
			  adaptiveHeight: false, // height of the sliders adapts to current slide
			  useCSS: false, // true, false -> fallback to js if no browser support
			  autoHover: false,
			  transition: 'fade'
			});
		</script>
		<!----start-pricerage-seletion---->
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script type='text/javascript'>//<![CDATA[ 
			$(window).load(function(){
			 $( "#slider-range" ).slider({
			            range: true,
			            min: 0,
			            max: 500,
			            values: [ 100, 400 ],
			            slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			            }
			 });
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
			
			});//]]>  
		</script>
		<!----//End-pricerage-seletion---->
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
	<body >
		<!---start-wrap---->
			<!---start-header---->
			<div class="header">
				<div class="top-header">
					<div class="wrap">
						<div class="top-header-left">
							
						</div>
						<div class="top-header-center">
							<div class="top-header-center-alert-left">
								<h3>FREE DELIVERY</h3>
							</div>
							<div class="top-header-center-alert-right">
								<div class="vticker">
								  <ul>
									  <li>Applies to orders of ‎GH₵50 or more. <label>Returns are always free.</label></li>
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
								<li><a href="signup.php">Signup</a><span> </span></li>
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
				<!----start-mid-head---->
				<div class="mid-header">
					<div class="wrap">
						<div class="mid-grid-left">
							<form>
								<input type="text" placeholder="What Are You Looking for?" />
							</form>
						</div>
						<div class="mid-grid-right">
						<img style="width:100px; " src="adminpage/images/booklogo.png" alt="" />
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

					</div>
				</div>
				</div>
				<!----//End-bottom-header---->
			<!---//End-header---->
		<!----start-image-slider---->
		<div class="img-slider">
			<div class="wrap">
			<ul id="jquery-demo">
			  <li>
			    <a href="#slide1">
			      <img style="width:350px; height:250px;  margin-top:20px;" src="adminpage/images/his.jpg" alt="" />
			    </a>
			    <div class="slider-detils">
			    	<h3>BOOKHOUSE <label>SHOP</label></h3>
			    	<span>Buy your books from Us,Your number one, bookshop.</span>
			    	<a class="slide-btn" href="details.html"> Shop Now</a>
			    </div>
			  </li>
			  <li>
			    <a href="#slide2">
			      <img style="width:350px;  height:250px; margin-top:20px;"  src="adminpage/images/harry.jpg"  alt="" />
			    </a>
			     <div class="slider-detils">
				 <h3>BOOKHOUSE <label>SHOP</label></h3>
			    	<span>Buy your books from Us,Your number one, bookshop.</span>
			    	<a class="slide-btn" href="cat_products.php?cat_id=1"> Shop Now</a>
			    </div>
			  </li>
			  <li>
			    <a href="#slide3">
			      <img style="width:350px;  height:250px;  margin-top:20px;" src="adminpage/images/Akiola.jpg" alt="" />
			    </a>
			     <div class="slider-detils">
				 <h3>BOOKHOUSE <label>SHOP</label></h3>
			    	<span>Buy your books from Us,Your number one, bookshop.</span>
			    	<a class="slide-btn" href="cat_products.php?cat_id=1"> Shop Now</a>
			    </div>
			  </li>
			</ul>
			</div>
		</div>
		<div class="clear"> </div>
		<!----//End-image-slider---->
		<!----start-price-rage--->
		<div class="wrap">
			<div class="price-rage">
				<h3>Make Your selection:</h3>
				<div id="slider-range">
				</div>
			</div>
		</div>
		<!----//End-price-rage--->
		<!--- start-content---->
		<div class="content">
			<div class="wrap">
				<div class="content-left">
						<div class="content-left-top-grid">
							<div class="content-left-price-selection">
                           
								
						</div>
						</div>
						<div class="content-left-bottom-grid">
							<h4>All kinds of books:</h4>
							<div class="content-left-bottom-grids">
								<div class="content-left-bottom-grid1">
									<img src="adminpage/images/mama.jpg" title="football" />
									<h5><a href="details.html">Children books</a></h5>
									<span> books</span>
									<label>GH₵ 5</label>
								</div>
								<div class="content-left-bottom-grid1">
									<img  src="adminpage/images/econs.jpg" title="jarse" />
									<h5><a href="details.html">Business Books</a></h5>
									<span> books</span>
									<label>GH₵ 35</label>
								</div>
							</div>
						</div>
				</div>
				<div class="content-right">
					<div class="product-grids">
						<!--- start-rate---->
							<script src="js/jstarbox.js"></script>
							<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
							<script type="text/javascript">
								jQuery(function() {
									jQuery('.starbox').each(function() {
										var starbox = jQuery(this);
										starbox.starbox({
											average: starbox.attr('data-start-value'),
											changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
											ghosting: starbox.hasClass('ghosting'),
											autoUpdateAverage: starbox.hasClass('autoupdate'),
											buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
											stars: starbox.attr('data-star-count') || 5
										}).bind('starbox-value-changed', function(event, value) {
											if(starbox.hasClass('random')) {
												var val = Math.random();
												starbox.next().text(' '+val);
												return val;
											} 
										})
									});
								});
							</script>
							<!---//End-rate---->
							<!---caption-script---->
							<!---//caption-script---->
					
						<?php get_home(); ?>
						<div class="clear"> </div>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		
	
		<!---//End-footer---->
		<!---//End-wrap---->
	</body>