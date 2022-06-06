<?php 
require 'db_connect.php';
 require 'backendheader.php';
 ?>


<!-- Page Heading -->
          <div class="row">
            <div class="col-11"><h1 class="h3 mb-2 text-gray-800">Item</h1></div>
            <div class="col-1 ml-auto"><a href="item_new.php" class="btn btn-primary"> + </a></div>
          </div>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
           <!--  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Code No</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Description</th>
                      <th>Brand</th>
                      <th>Subcategory</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Code No</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Description</th>
                      <th>Brand</th>
                      <th>Subcategory</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                     
                      $sql="SELECT items.id as iid, items.name as iname, items.codeno as cno,items.price as iprice, items.discount as idiscount, items.description as idescription, brands.name as bname, subcategories.name as sname FROM brands INNER JOIN items ON brands.id=items.brand_id JOIN subcategories ON items.subcategory_id=subcategories.id ORDER BY brands.name ASC , subcategories.name ASC";
                     
                      $stmt=$pdo->prepare($sql);
                      $stmt->execute();
                      $rows=$stmt->fetchAll();

                      $i=1;

                      //print("<pre>".print_r($rows,true)."</pre>");
                      foreach ($rows as $row)
                      {
                        $id=$row['iid'];
                        $name=$row['iname'];
                        $cno=$row['cno'];
                        $price=$row['iprice'];
                        $discount=$row['idiscount'];
                        $description=$row['idescription'];
                        $bname=$row['bname'];
                        $sname=$row['sname'];
                      
                     ?>

                     <tr>
                      <td><?php echo $i++ ?> </td>
                      <td><?php echo $name ?></td>
                      <td><?php echo $cno ?></td>
                      <td><?php echo $price ?></td>
                      <td><?php echo $discount ?></td>
                      <td><?php echo $description ?></td>
                      <td><?php echo $bname ?></td>
                      <td><?php echo $sname ?></td>
                      <td>
                        <a href="item_edit.php?id=<?php echo $id ?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                        <a href="item_delete.php?id=<?php echo $id ?>" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                      </td>
                     </tr>

                     <?php 
                     }
                      ?>


                  </tbody>               
                 </table>
              </div>
            </div>
          </div>
 
 <?php 
require 'backendfooter.php';
?>