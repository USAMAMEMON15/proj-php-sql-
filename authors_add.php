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
                            <span class="ml-1 fw-bold">Role</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Authors Here</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">
                                        <div class="form-group" >
                                            <label for="">Author Name</label>
                                            <input type="text" name="author_name" class="form-control input-default " placeholder="Enter Your Authore Name">
                                        </div>
                                          <div class="form-group" >
                                            <label for="">Date Of Birth</label>
                                            <input type="date" name="dob" class="form-control input-default " placeholder="Enter Your Date Of Birth ">
                                        </div>
                                          <div class="form-group" >
                                            <label for="">Location</label>
                                            <input type="text" name="location" class="form-control input-default " placeholder="Enter Your Location">
                                        </div>
                                          <div class="form-group" >
                                            <label for="">Images</label>
                                            <input type="file" name="image" class="form-control input-default " placeholder="Uplode Your Image">
                                        </div>
                                         <button type="submit" name="submit" class="btn btn-primary">Add Author</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                
                </div>
                </div>
                </div>
                </div>
<?php
if (isset($_POST['submit'])){
    $author_name = $_POST ['author_name'];
    $dob = $_POST ['dob'];
    $location = $_POST ['location'];
    $image = $_FILES['image']['name'];
    $sql = "insert into authors (author_name , dob , location , image) values('$author_name' , '$dob' , '$location' , '$image')";
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
        </script>";
    }
}

include("./footer.php");
?>


