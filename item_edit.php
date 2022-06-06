

<?php 
 require 'backendheader.php';
 require 'db_connect.php';

 $id=$_GET['id'];
 $sql="SELECT * FROM items WHERE id=:id";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id',$id);
 $stmt->execute();
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 $id=$row['id'];
 $name=$row['name'];
 $photo=$row['photo'];
 $bid=$row['brand_id'];
 $sid=$row['subcategory_id'];
 $codeno=$row['codeno'];
 $price=$row['price'];
 $discount=$row['discount'];
 $description=$row['description'];

 ?>
  <h1 class="h3 mb-2 text-gray-800">Item</h1>
  <a href="item_list.php" class="btn btn-primary"> << </a>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Existing Item</h6>
            </div>
            <div class="card-body">
                <form method="post" action="item_update.php" enctype="multipart/form-data">
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
                        <label for="codeno" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Enter Item Name" name="name" value=<?php echo $name; ?>>
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
                                 <option 
                                    <?php if($id==$bid){
                                        echo "selected='selected'";}?>
                                  value="<?php echo $id; ?>">
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
                                 <option 
                                <?php if($id==$sid){
                                        echo "selected='selected'";}?>
                                 value="<?php echo $id; ?>">
                                     <?php echo $name; ?>
                                 </option>

                                 <?php } ?>         
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="codeno" class="col-sm-2 col-form-label">Codeno</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="codeno" placeholder="Enter Item Code No" name="codeno" value=<?php echo $codeno; ?>>
                        </div>
                    </div>
                   
                    
                    <div class="form-group row">
                        <label for="itemPrice" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="itemPrice" placeholder="Enter Item Price" name="price" value=<?php echo $price; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="itemDiscount" class="col-sm-2 col-form-label">Discount</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="itemDiscount" placeholder="Enter Item Discount" name="discount" value=<?php echo $discount; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="itemDescription" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="itemDescription" placeholder="Enter Item Description" name="description" ><?php echo $description; ?></textarea>
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