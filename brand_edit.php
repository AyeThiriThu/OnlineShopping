<?php 
require 'db_connect.php';
require 'backendheader.php';

$id=$_GET['id'];
$sql="SELECT * FROM brands WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);

$id=$row['id'];
$name=$row['name'];
$photo=$row['logo'];
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Brand</h1>

<a href="brand_list.php" class="btn btn-primary"><<</a>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
	</div>
	<div class="card-body">

		<form id="editSection" method="post" action="brand_update.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="hidden" name="oldphoto" value="<?php echo $photo ?>">



			<div class="form-group row">
				<label for="inputPassword" class="col-md-2 col-form-label">Logo</label>
				<div class="col-md-10">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="Old-tab" data-toggle="tab" href="#Old" role="tab" aria-controls="Old" aria-selected="true">Old Profile</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="New-tab" data-toggle="tab" href="#New" role="tab" aria-controls="New" aria-selected="false" name="profile">New Profile</a>
						</li>  
					</ul>

					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="Old" role="tabpanel" aria-labelledby="Old-tab"><img src="<?php echo $photo ?>" style="width: 120px;height: 120px;" class="img-fluid" ></div>

						<div class="tab-pane fade" id="New" role="tabpanel" aria-labelledby="New-tab">
							<input type="file"  name="image"></div>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="categoryName" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="categoryName" placeholder="Enter Brand Name" name="name" value="<?php echo $name ?>">
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
