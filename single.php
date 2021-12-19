
<?php

use App\controllers\StudentController;

require_once"vendor/autoload.php";

$stu = new StudentController;

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$single_student = $stu -> viewData($id);
	
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

<div class="single-user my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-2">
                

                <div class="card">
                
                    <div class="card-body">

                    <a class="btn btn-primary" href="index.php">Back</a>
                <br>
                    <img style="width: 300px; height:300px; border-radius:50%; display:block; margin:auto; " src="photos/students/<?php echo $single_student->photo; ?>" alt="">
                    <h2><?php echo $single_student->name; ?></h2>
                    
                    <table class="table table-stripped">
                        <tr>
                            <td>Name</td>
                            <td><?php echo $single_student->name; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $single_student->email; ?></td>
                        </tr>
                        <tr>
                            <td>Cell</td>
                            <td><?php echo $single_student->cell; ?></td>
                        </tr>
                        <tr>
                            <td>User name</td>
                            <td><?php echo $single_student->username; ?></td>
                        </tr>
                        
                    </table>
                    </div>
                </div>
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