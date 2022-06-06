
<?php 
 require 'backendheader.php';
 require 'db_connect.php';

 $id=$_GET['id'];
 $sql="SELECT * FROM categories WHERE id=:id";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id',$id);
 $stmt->execute();
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 $id=$row['id'];
 $name=$row['name'];
 $photo=$row['photo'];
 ?>
  <h1 class="h3 mb-2 text-gray-800">Category</h1>
  <a href="category_list.php" class="btn btn-primary"> << </a>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Existing Category</h6>
            </div>
            <div class="card-body">
            		<form method="post" action="category_update.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="oldphoto" value="<?php echo $photo; ?>">
			<div class="row pt-2">
				<div class="col-lg-2"><p>Profile</p></div>
					<div class="col-lg-10">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
		 					<li class="nav-item" role="presentation">
		    					<a class="nav-link active" id="old-tab" data-toggle="tab" href="#old" role="tab" aria-controls="old" aria-selected="true">Old Profile</a>
		  					</li>
		  					<li class="nav-item" role="presentation">
		   						 <a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="false">New Profile</a>
		 					</li>
						</ul>
						<div class="tab-content" id="myTabContent">
		 			 	<div class="tab-pane fade show active" id="old" role="tabpanel" aria-labelledby="home-tab">
		 			 		<img src="<?php echo $photo; ?>" class="img-fluid" style="width:120px; height: 120px;">
		 			 	</div>
		  			 	<div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="profile-tab">
		  			 		<input type="file" name="image">
		  			 	</div>
					</div>
				</div>
			</div>
            		<div class="form-group row">
            			<label for="categoryName" class="col-sm-2 col-form-label">Name</label>
            			<div class="col-sm-10">
            				<input type="text" class="form-control" id="categoryName" placeholder="Enter Category Name" name="name" value=<?php echo $name; ?>>
            			</div>
            		</div>
            		<div class="form-group row">
            			<div class="col-sm-2"></div>
            			<div class="col-sm-10">
            				<button type="submit" class="btn btn-primary">
            					<i class="fa fa-upload"></i>Update
            				</button>
            			</div>

            		</div>
            	</form>
            	
			
            </div>
          </div>

 <?php 
require 'backendfooter.php';
?>