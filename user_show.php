<?php 
include("header.php");
include("conn.php");

$sql ="select users .* , role.role_name from users join role on role.id = users.roleId_FK";
$result = $conn->query($sql);
?>


<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
                        </ol>
                    </div>
                </div>


                 <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-sm text-dark">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>UserName</th>
                                                <th>Role Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php 
                                                
                                                while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                                <th><?php echo $row['id']?></th>
                                                <td><?php echo $row['username']?></td>
                                                <td><?php echo $row['role_name']?></td>
                                                <td><a href="user_edit.php?id=<?php echo $row['id']?>" class="btn btn-primary">Edit</a></td>
                                                <td><a href="user_delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php 
                    include("footer.php");
                ?>
