
<?php 
 require 'db_connect.php';
 require 'backendheader.php';
 ?>
  <h1 class="h3 mb-2 text-gray-800">Subcategory</h1>
  <a href="subcategory_list.php" class="btn btn-primary"> << </a>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Create New Subcategory</h6>
            </div>
            <div class="card-body">
            	<form action="subcategory_add.php" method="POST">
            		<div class="form-group row">
            			<label for="category" class="col-sm-2 col-form-label">category</label>
            			<div class="col-sm-10">
            				<select name="category" class="form-control">
                                <option selected>Choose Category </option>  
                                <?php 
                                 $sql="SELECT * FROM categories";
                                 $stmt=$pdo->prepare($sql);
                                 $stmt->execute();
                                 $rows=$stmt->fetchAll();

                                 foreach ($rows as $row) {
                                     $id=$row['id'];
                                     $name=$row['name'];
                                 
                                 ?> 
                                 <option value="<?php echo $id; ?>">
                                     <?php echo $name; ?>
                                 </option>

                                 <?php } ?>         
                            </select>
            			</div>
            		</div>
            		<div class="form-group row">
            			<label for="categoryName" class="col-sm-2 col-form-label">Name</label>
            			<div class="col-sm-10">
            				<input type="text" class="form-control" id="categoryName" placeholder="Enter Category Name" name="name">
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