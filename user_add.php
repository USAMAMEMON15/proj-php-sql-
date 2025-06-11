<?php
include("header.php");
include("conn.php");

$sql = "select * from role";
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
                                <h4 class="card-title">user Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>State</label>
                                                <select id="inputState" class="form-control" name="u_r_id">
                                                   <?php
                                                   while($row = $result->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $row['id']?>"><?php echo $row['role_name']?></option> 

                                              <?php } ?>     
                                                   
                                            
                                                </select>
                                            </div>
                                           
                                        </div>

                                        <div class="form-row">
    
                                            <div class="form-group col-md-12">
                                                <label>Name</label>
                                                <input type="username" class="form-control" name ="username" placeholder="username">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Password</label>
                                                <input type="password" name ="password" class="form-control" placeholder="Password">
                                            </div>
                                        
                                        </div>
                                     
                                        <button type="submit" class="btn btn-primary">User add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>


<?php

if(isset($_post['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roleId = $_POST['u_r_id'];
    $sql ="insert into users (username , password , roleId_ FK) values ('$username' , '$password' , '$roleId')";
    $result = $conn->query($sql);

    if($result == true){
        echo "<script>
        alert('User has been added Successfully!');
        </script>";
    }
}

include("footer.php")
?>