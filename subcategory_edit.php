
<?php 
 require 'backendheader.php';
 require 'db_connect.php';

 $id=$_GET['id'];
 $sql="SELECT * FROM subcategories WHERE id=:id";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id',$id);
 $stmt->execute();
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 $id=$row['id'];
 $name=$row['name'];
 $catid=$row['category_id'];
 ?>
  <h1 class="h3 mb-2 text-gray-800">Subcategory</h1>
  <a href="category_list.php" class="btn btn-primary"> << </a>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Existing Subcategory</h6>
            </div>
            <div class="card-body">
                <form action="subcategory_update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">category</label>
                        <div class="col-sm-10">
                            <select name="category" class="form-control">
                                <option >Choose Category </option>  
                                <?php 
                                 $sql="SELECT * FROM categories";
                                 $stmt=$pdo->prepare($sql);
                                 $stmt->execute();
                                 $rows=$stmt->fetchAll();

                                 foreach ($rows as $row) {
                                     $id=$row['id'];
                                     $cname=$row['name'];
                                 
                                 ?> 
                                 <option 
                                    <?php if($id==$catid){
                                        echo "selected='selected'";}?>
                                    
                                 value="<?php echo $id; ?>">
                                     <?php echo $cname; ?>
                                 </option>

                                 <?php } ?>         
                            </select>
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