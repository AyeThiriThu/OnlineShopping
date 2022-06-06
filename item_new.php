
<?php 
 require 'db_connect.php';
 require 'backendheader.php';
 ?>
  <h1 class="h3 mb-2 text-gray-800">Item</h1>
  <a href="item_list.php" class="btn btn-primary"> << </a>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Create New Item</h6>
            </div>
            <div class="card-body">
            	<form action="item_add.php" method="POST" enctype="multipart/form-data">
                     <div class="form-group row">
                        <label for="itemName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="itemName" placeholder="Enter Item Name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subcategory" class="col-sm-2 col-form-label">Brand</label>
                        <div class="col-sm-10">
                            <select name="brand" class="form-control">
                                <option selected>Choose Brand </option>  
                                <?php 
                                 $sql="SELECT * FROM brands";
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
            			<label for="subcategory" class="col-sm-2 col-form-label">Subcategory</label>
            			<div class="col-sm-10">
            				<select name="subcategory" class="form-control">
                                <option selected>Choose Subcategory </option>  
                                <?php 
                                 $sql="SELECT * FROM subcategories";
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
            			<label for="codeno" class="col-sm-2 col-form-label">Codeno</label>
            			<div class="col-sm-10">
            				<input type="text" class="form-control" id="codeno" placeholder="Enter Item Code No" name="codeno">
            			</div>
            		</div>
                   
                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                            <input type="file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="itemPrice" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="itemPrice" placeholder="Enter Item Price" name="price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="itemDiscount" class="col-sm-2 col-form-label">Discount</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="itemDiscount" placeholder="Enter Item Discount" name="discount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="itemDescription" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="itemDescription" placeholder="Enter Item Description" name="description">
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