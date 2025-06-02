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
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Role Here</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">
                                        <div class="form-group" >
                                            <input type="text" name="role_name" class="form-control input-default " placeholder="Enter Your Role Name">
                                        </div>
                                         <button type="submit" name="submit" class="btn btn-primary">Add Role</button>
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
    $role_name = $_POST ['role_name'];
    $sql = "insert into role (role_name) values ('$role_name')";
    $result = $conn->query($sql);

    if ($result==true){
        echo "<script> alert ('Role Has Been Added Succesfuly') </script>";
    }
}
?>


<?php
include ("footer.php");
?>