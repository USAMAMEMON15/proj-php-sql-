
<?php
include("conn.php");


    $id =  $_GET ['id'];
    $sql = " delete from users where id = $id";
    $result = $conn->query($sql);

    if($result == true){
        echo "<script> 
        
        alert ('Users Has Been Deleted Succesfuly');
        window.location.href = 'role_show.php'; 
        
        </script>";

    }

include ("footer.php");
?>