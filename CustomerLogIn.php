<?php include_once("settings.php");  ?>


<div class="content login-box">
			<div class="login-main">
				<div class="wrap">
                    <h1>LOGIN OR CREATE AN ACCOUNT</h1>
                    
                <div class="row">
					<div class="login-left" style="margin-top:80px">
						<h3>NEW CUSTOMERS</h3>
						<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
						<a class="acount-btn" href="signup.php">Creat an Account</a>
					</div>
					<div class="login-right" style="margin-top:80px">
                        <h3>REGISTERED CUSTOMERS</h3>
                        <h5> <?php  checkout_signin()   ?></h5>
						<p>If you have an account with us, please log in.</p>
						<form method="post">
							<div>
								<span>Email Address<label>*</label></span>
								<input type="email" name="c_email" required> 
							</div>
							<div>
								<span>Password<label>*</label></span>
								<input type="password" name="c_password" required> 
							</div>
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" name="signin_submit" value="Login" />
						</form>
					</div>
                 </div>
					<div class="clear"> </div>
				</div>
			</div>
         
		</div>