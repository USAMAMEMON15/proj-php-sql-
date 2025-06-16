<?php 
include("header.php");
include("conn.php");

$sql ="select * from role";
$result = $conn->query($sql);
?>


  <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span class="ml-1">Element</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                        </ol>
                    </div>
                </div>
                






<div class="card">
    <div class="card-header">
        <h4 class="card-title">User Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>State</label>
                                                <select id="inputState" class="form-control" name="u_r_id">
                                                    <?php
                                                    while ($row = $result->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $row ['id'] ?>"><?php echo $row ['role_name'] ?></option>
                                                  <?php  }  ?>
                                                    
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                               <?php
                                                $sql = "select * from users where id = ".$_GET['id'];
                                                $result = $conn->query($sql);
                                                $users = mysqli_fetch_assoc($result);
                                               ?> 
                                           
                                                <label>Name</label>
                                                <input type="text" name="username" value="<?php echo $users['username']?>" class="form-control" placeholder="Name">
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label>Password</label>
                                                <input type="password" value="<?php echo $users['password']?>" name="password" class="form-control" placeholder="Password">
                                            </div>
                                            
                                        </div>
                                        
                                        <button type="submit" name="update" class="btn btn-primary">Update User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>

<?php 
if(isset($_POST['update'])){
    $id = $_GET['id'];
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $roleID = $_POST ['u_r_id'];
    $sql = "update users set username = '$username',password = '$password',roleId_FK= ' $roleID' where id  = $id";
    $result = $conn->query($sql);

    if($result == true){
         echo "<script> 
        
        alert ('User Has Been Updated Succesfuly');
        </script>";
    }
}
include("footer.php");
?>