
<?php

use App\Supports\Validate;
use App\controllers\StudentController;

require_once"vendor/autoload.php";

$stu = new StudentController;
$msg = '';
if (isset($_GET['id'])) {
	$id = $_GET['id'];


     
	$edit_student = $stu -> editData($id);
	
}

    if (isset($_POST['update'])){

        
           $name = $_POST['name'];
           $email = $_POST['email'];
           $cell = $_POST['cell'];
           $uname = $_POST['uname'];
           
     if (empty($name) || empty($email) || empty($cell) || empty($uname)) {
        $msg = Validate::msg ('All fields are required!' );
     }else if (Validate::email($email) == false) {
         $msg = Validate::msg ('Invalid email address!' );
         
     }else{
         $this-> updateData($id, $name, $email, $cell, $uname);
     }

    }
     


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit profile</title>
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
                    <?php Validate::show($msg);?>
                <br>
                    <img style="width: 300px; height:300px; border-radius:50%; display:block; margin:auto; " src="photos/students/<?php echo $edit_student->photo; ?>" alt=" ">
                    <h2>Edit Profile: <?php echo $edit_student->name; ?></h2>
                    <hr>
                    

                    <form action="">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" class="form-control" type="text" value="<?php echo $edit_student->name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" class="form-control" type="email" value="<?php echo $edit_student->email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Cell</label>
                            <input name="cell" class="form-control" type="text" value="<?php echo $edit_student->cell; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">User name</label>
                            <input name="uname" class="form-control" type="text" value="<?php echo $edit_student->username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Upload photo</label><br>
                            <input name="photo" class="btn btn-primary" type="file">
                        </div>
                        <div class="form-group">
                        
                            <input name="update" class="btn btn-primary" type="submit" value="Update Profile">
                        </div>
                    </form>

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