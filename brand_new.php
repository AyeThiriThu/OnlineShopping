
<?php 
 require 'backendheader.php';
 ?>
  <h1 class="h3 mb-2 text-gray-800">Brand</h1>
  <a href="brand_list.php" class="btn btn-primary"> << </a>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Create New Brand</h6>
            </div>
            <div class="card-body">
            	<form action="brand_add.php" method="POST" enctype="multipart/form-data">
            		<div class="form-group row">
            			<label for="image" class="col-sm-2 col-form-label">Logo</label>
            			<div class="col-sm-10">
            				<input type="file" name="image">
            			</div>
            		</div>
            		<div class="form-group row">
            			<label for="brandName" class="col-sm-2 col-form-label">Name</label>
            			<div class="col-sm-10">
            				<input type="text" class="form-control" id="brandName" placeholder="Enter Brand Name" name="name">
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