
<?php

use App\controllers\StudentController;

require_once"vendor/autoload.php";

$stu = new StudentController;

if (isset($_GET['delete_id'])) {
	$delete_id = $_GET['delete_id'];

	$stu -> deleteData($delete_id);
	header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

<?php

/**
 * Isset add student form
 */

use App\Supports\Validate;
$msg = '';
if (isset($_POST['add'])){

	//Getting all value

	$name = $_POST['name'];
	$email = $_POST['email'];
	$cell = $_POST['cell'];
	$uname = $_POST['uname'];

	if(empty($name) || empty($email) || empty($cell) || empty($uname) ){

		$msg = Validate::msg ('All fields are required!' );
	}else if (Validate::email($email) == false) {
		$msg = Validate::msg ('Invalid email address!' );

	}else {
		$stu -> studentCreate($name, $email, $cell, $uname);
	}

 }

?>
	
<div class="wrap-table">	
	<a class="btn btn-primary"  data-toggle="modal" href="#add_student">Add new Student</a>

	<div class="wrap-table shadow">

	<?php 

	Validate::show($msg);
	?>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
						
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
					 
					 /**This is Raw connection ( Not oop)
					  * 
					  * $conn = new mysqli('localhost','root','','socialoop');
					 * $data = $conn ->query("SELECT * FROM students");
					  */
					
					$data = $stu -> getAllStudentData();

					while($d = $data -> fetch_object()):
					
					?>
						<tr>
							<td>1</td>
							<td><?php echo $d->name; ?></td>
							<td><?php echo $d->email; ?></td>
							<td><?php echo $d->cell; ?></td>
							<td><img src="photos/students/<?php echo $d->photo; ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="single.php?id=<?php echo $d->id; ?>">View</a>
								<a class="btn btn-sm btn-warning" href="edit.php?id=<?php echo $d->id; ?>">Edit</a>
								<a class="btn btn-sm btn-danger" href="?delete_id=<?php echo $d->id; ?>">Delete</a>
							</td>
						</tr>
						<?php
						endwhile;

						?>
						

						

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Add new student Modal  -->

<div id ="add_student" class="modal fade">
	<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
	<div class="modal-header">

	<h3>Add new Student</h3>
	<button class="close" data-dismiss="modal" >&times;</button>

	</div>
	
	<div class="modal-body">

	
		<form action="" method="POST" enctype="multipart/form-data" >
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="image_upload" >Upload Photo</label>
						<input name="photo" class="form-control" id="image_upload" type="file">
					</div>
					<div class="form-group">
						<input name="add" class="btn btn-primary" type="submit" value="Add Student">
					</div>
				</form>
	</div>
</div>
	</div>
</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>