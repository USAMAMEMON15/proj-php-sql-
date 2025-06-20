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
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group mb-4" >

                                            <label class="text-dark">Category Name</label>
                                            <input type="text" name="category_name" class="form-control input-default " placeholder="Enter Your Category Name">

                                        </div>
                                        <div class="form-group" >

                                            <label class="text-dark">Category Image</label>
                                            <input type="file" name="image" class="form-control input-default " placeholder="Image">

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
    $id = $_GET['id'];
    $categoryName = $_POST ['category_name'];
    $image = $_FILES['image']['name'];
    // $sql = "update into category (categoryName , categoryImage) values('$categoryName' , '$image')";
     $sql = "update category set categoryName = '$categoryName',categoryImage = '$image' where id  = $id";
    $result = $conn->query($sql);
    
    if(isset($_FILES)){
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp , "images/category/".$file_name);
    }

    if($result == true){
        echo "<script>
        alert('category has been Registered');
        </script>";
    }
}

include("./footer.php");
?>

