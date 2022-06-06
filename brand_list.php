<?php 
require 'db_connect.php';
 require 'backendheader.php';
 ?>


<!-- Page Heading -->
          <div class="row">
            <div class="col-11"> <h1 class="h3 mb-2 text-gray-800">Brand</h1></div>
            <div class="col-1"><a href="brand_new.php" class="btn btn-primary"> + </a></div>
          </div>
         
          
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Logo</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Logo</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                      $sql="SELECT * FROM brands ORDER BY name ASC";
                      $stmt=$pdo->prepare($sql);
                      $stmt->execute();
                      $rows=$stmt->fetchAll();
                      $i=1;

                      //print("<pre>".print_r($rows,true)."</pre>");
                      foreach ($rows as $row)
                      {
                        $id=$row['id'];
                        $name=$row['name'];
                      
                     ?>

                     <tr>
                      <td><?php echo $i++ ?> </td>
                      <td><?php echo $name ?></td>
                      <td>
                        <a href="brand_edit.php?id=<?php echo $id ?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                        <a href="brand_delete.php?id=<?php echo $id ?>" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
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