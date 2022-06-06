<?php 
require 'db_connect.php';

require 'frontendheader.php';
 ?>



	

	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Featured Products</h2>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
				</div>
				<div class="row">
				<?php 

                  	$sql="SELECT items.photo as iphoto, items.id as iid, items.name as iname, items.codeno as cno,items.price as iprice, items.discount as idiscount, items.description as idescription, brands.name as bname, subcategories.name as sname FROM brands INNER JOIN items ON brands.id=items.brand_id JOIN subcategories ON items.subcategory_id=subcategories.id ORDER BY brands.name ASC , subcategories.name ASC";

                  	$stmt=$pdo->prepare($sql);
                  	$stmt->execute();
                  	$rows=$stmt->fetchAll();
                  	$i=1;

                  	// print("<prev>".print_r($row,true)."</pre>") ;
                  	foreach($rows as $row)
                  		{$photo=$row['iphoto'];
                  		$id=$row['iid'];
                        $name=$row['iname'];
                        $codeno=$row['cno'];
                        $price=$row['iprice'];
                        $discount=$row['idiscount'];
                        $description=$row['idescription'];
                        $bname=$row['bname'];
                        $sname=$row['sname'];
                      
                  		 
                  		?>
                  		

				
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="f_p_item">
							<div class="f_p_img">
								<img class="img-fluid"  src="<?php echo $photo; ?>" alt="" style="width:400px; height:400px">
								<div class="p_icon">

									
									<?php 
									if(isset($_SESSION['loginuser'])){ ?>
									<a href="javascript:void(0)">
										<i class="lnr lnr-heart"></i>
									</a>
									<a href="javascript:void(0)" class="lnr lnr-cart addtocart" data-id="<?= $id;?>" data-name="<?= $name;?>" data-codeno="<?= $codeno;?>" data-photo="<?= $photo;?>" data-price="<?= $price;?>" data-discount="<?= $discount;?>" >
									
										<!-- <i class="lnr lnr-cart"></i> -->
									</a>

								<?php }else{ ?>
									<a href="#">
										<i class="lnr lnr-heart"></i>
									</a>
									<a href="login.php" class="lnr lnr-cart" data-toggle="tooltip" data-placement="top" title="If you want to order,you must need to be our member">
										<!-- <i class="lnr lnr-cart"></i> -->
									</a>
								<?php } ?>
								</div>
							</div>
							<a href="#">
								<h4><?php echo $name; ?></h4>
							</a>
					
							<h5 class="text-primary"><?php echo $price; ?> MMK</h5>
							<p class="text-danger"><?php echo $discount; ?> MMK</p>
							<h5><?php echo $bname; ?></h5><br>
							<h5><?php echo $description ?></h5>
						</div>
					</div>

                  		<?php 
                  	}
                  	?>
					
				</div>

				<div class="row">
					<nav class="cat_page mx-auto" aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#">
									<i class="fa fa-chevron-left" aria-hidden="true"></i>
								</a>
							</li>
							<li class="page-item active">
								<a class="page-link" href="#">01</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">02</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">03</a>
							</li>
							<li class="page-item blank">
								<a class="page-link" href="#">...</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">09</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!--================End Feature Product Area =================-->

	<!--================ Subscription Area ================-->
	<section class="subscription-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h2>Subscribe for Our Newsletter</h2>
						<span>We won’t send any kind of spam</span>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div id="mc_embed_signup">
						<form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01"
						 method="get" class="subscription relative">
							<input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
							 required="">
							<!-- <div style="position: absolute; left: -5000px;">
								<input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
							</div> -->
							<button type="submit" class="newsl-btn">Get Started</button>
							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Subscription Area ================-->
	<?php 

require 'frontendfooter.php';
 ?>