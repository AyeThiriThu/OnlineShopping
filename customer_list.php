<?php 
require 'db_connect.php';
 require 'backendheader.php';
 ?>


<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Customer</h1>
          <!-- <a href="category_new.php" class="btn btn-primary"> + </a> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php 
                  		$sql="SELECT * FROM users ORDER BY name ASC";
                  		$stmt=$pdo->prepare($sql);
                  		$stmt->execute();
                  		$rows=$stmt->fetchAll();
                  		$i=1;

                  		//print("<pre>".print_r($rows,true)."</pre>");
                  		foreach ($rows as $row)
                  		{
                  			$id=$row['id'];
                  			$name=$row['name'];
                        $email=$row['email'];
                        $password=$row['password'];
                        $phone=$row['phone'];
                        $address=$row['address'];
                  		
                  	 ?>

                  	 <tr>
                  	 	<td><?php echo $i++ ?> </td>
                  	 	<td><?php echo $name ?></td>
                      <td><?php echo $email ?></td>
                      <td><?php echo $password ?></td>
                      <td><?php echo $phone ?></td>
                      <td><?php echo $address ?></td>

                  	 	<td>
                  	 		<a href="customer_edit.php?id=<?php echo $id ?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                  	 		<a href="customer_delete.php?id=<?php echo $id ?>" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
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