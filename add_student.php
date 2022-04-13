<?php

    include_once "template/header.php";
    include_once "vendor/autoload.php";
    use App\Controllers\Student;
    $student = new Student;





    if (isset($_POST['submit'])) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $cell = $_POST['cell'];
        $address = $_POST['address'];

        //File Management........
        $image = $_FILES['image']['name'];
        $expo = explode(".",$image);
        $end = end($expo);
        $img_f_name = md5(time().rand()).".". strtolower($end);
        $image_tmp_name = $_FILES['image']['tmp_name'];


        if (empty($name)||empty($email)||empty($cell)||empty($address)||empty($image)) {
            $mess = "<p class='alert alert-danger'> Field Must not be Empty !<button style='float:right;' class='close' data-dismiss='alert' >&times;</button></p>";
        }else{

            $data = $student -> student_create($name,$email,$cell,$address,$img_f_name);
            move_uploaded_file($image_tmp_name,"img/student/".$img_f_name);

            if ($data == true) {
                $mess = "<p class='alert alert-danger'> Studenr Create Successfully !<button style='float:right;' class='close' data-dismiss='alert' >&times;</button></p>";
            }


        }



    }

    



?>

			
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
    <div class="mt-2 w-50 mx-auto mess">
		<?php
			if (isset($mess)) {
			echo $mess;
			}
		?>
	</div>

    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-xl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h4 class="card-title">Add Student</h4>
                </div>
                <div class="card-body">


                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Full Name</label>
                            <div class="col-lg-9">
                                <input name="name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Email Address</label>
                            <div class="col-lg-9">
                                <input name="email" type="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Cell</label>
                            <div class="col-lg-9">
                                <input name="cell" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Address</label>
                            <div class="col-lg-9">
                                <input name="address" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Image</label>
                            <div class="col-lg-9">
                                <input name="image" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="text-right">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /Page Wrapper -->


<?php include_once "template/footer.php" ?>

