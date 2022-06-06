
<?php 
 require 'backendheader.php';
 ?>
  <h1 class="h3 mb-2 text-gray-800">Category</h1>
  <a href="category_list.php" class="btn btn-primary"> << </a>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Category New Category</h6>
            </div>
            <div class="card-body">
            	<form action="category_add.php" method="POST" enctype="multipart/form-data">
            		<div class="form-group row">
            			<label for="categoryName" class="col-sm-2 col-form-label">Photo</label>
            			<div class="col-sm-10">
            				<input type="file" name="image">
                            <?php 
                            // no if, indefined _SESSION error
                                if(isset($_SESSION['validate_photo_msg'])){
                                  echo $_SESSION['validate_photo_msg'];
                                  unset($_SESSION['validate_photo_msg']);   
                                }
                                
                             ?>
            			</div>
            		</div>
            		<div class="form-group row">
            			<label for="categoryName" class="col-sm-2 col-form-label">Name</label>
            			<div class="col-sm-10">
            				<input type="text" class="form-control" id="categoryName" placeholder="Enter Category Name" name="name">
                            <?php 
                               if(isset($_SESSION['validate_name_msg'])){
                                  echo $_SESSION['validate_name_msg'];
                                  unset($_SESSION['validate_name_msg']);   
                                }
                             ?>
            			</div>
            		</div>
            		<div class="form-group row">
            			<div class="col-sm-2"></div>
            			<div class="col-sm-10">
            				<button type="submit" class="btn btn-primary">
            					<i class="fa fa-save"></i>Save
            				</button>
            			</div>

            		</div>
            	</form>
            </div>
          </div>

 <?php 
require 'backendfooter.php';
?>