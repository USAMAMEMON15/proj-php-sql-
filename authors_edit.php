<?php
include ("header.php");
include ("conn.php");
?>

<!--**********************************
 Content body start
 ***********************************-->
<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span class="ml-1 fw-bold text-dark">Category</span>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                        </ol>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group mb-4" >

                                            <label class="text-dark">Author Name</label>
                                            <input type="text" name="author_name" class="form-control input-default " placeholder="Enter Your Author Name">

                                        </div>
                                        <div class="form-group mb-4" >

                                            <label class="text-dark">Date Of Birth</label>
                                            <input type="date" name="dob" class="form-control input-default " placeholder="Enter Date Of Birth">

                                        </div>
                                        <div class="form-group mb-4" >

                                            <label class="text-dark">Location</label>
                                            <input type="text" name="location" class="form-control input-default " placeholder="Enter Location">

                                        </div>
                                        <div class="form-group" >

                                            <label class="text-dark">Image</label>
                                            <input type="file" name="image" class="form-control input-default " placeholder="Uplode Your Image">

                                        </div>
                                         <button type="submit" name="update" class="btn btn-primary">Add Category</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                
                </div>
                </div>
                </div>
                </div>


<?php
if (isset($_POST['update'])){
    $author_name = $_POST ['author_name'];
    $dob = $_POST ['dob'];
    $location = $_POST ['location'];
    $image = $_FILES['image']['name'];
    $id =$_GET['id'];
    $sql = "update authors set author_name = '$author_name',dob = '$dob',location = '$location',imagee = '$image' where id = $id";
    $result = $conn->query($sql); 
    
    if(isset($_FILES)){
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp , "images/authors/".$file_name);
    }

    if($result == true){
        echo "<script>
        alert('Authors has been Registered');
         window.location.href = 'authors_show.php';
        </script>";
    }
}

include("./footer.php");
?>


