<?php 

require 'frontendheader.php';
 ?>

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Login/Register</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="registration.html">Register</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="frontend/img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="main_btn" href="#">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<?php
				           if(isset($_SESSION['success_msg'])){
				           echo $_SESSION['success_msg'];
				           unset($_SESSION['success_msg']);
				         }
				         if(isset($_SESSION['err_msg'])){
				          echo $_SESSION['err_msg'];
				           unset($_SESSION['err_msg']);
				         }
  						?>
						<h3>Please Register Here!</h3>
						<form class="row login_form" action="signup.php" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
							<div class="col-md-12 form-group">
								<input type="file" class="form-control" id="image" name="image">
								 
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">
								<?php 
                            // no if, indefined _SESSION error
                                if(isset($_SESSION['validate_name_msg'])){
                                  echo $_SESSION['validate_name_msg'];
                                  unset($_SESSION['validate_name_msg']);   
                                }
                                
                             ?>
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
								<?php 
                            // no if, indefined _SESSION error
                                if(isset($_SESSION['validate_email_msg'])){
                                  echo $_SESSION['validate_email_msg'];
                                  unset($_SESSION['validate_email_msg']);   
                                }
                                
                             ?>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<?php 
                            // no if, indefined _SESSION error
                                if(isset($_SESSION['validate_password_msg'])){
                                  echo $_SESSION['validate_password_msg'];
                                  unset($_SESSION['validate_password_msg']);   
                                }
                                
                             ?>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
							</div>
							<div class="col-md-12 form-group">
								<textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
							</div>
							
							
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<?php 

require 'frontendfooter.php';
 ?>
