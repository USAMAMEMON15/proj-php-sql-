  <?php 
    include("conn.php"); 
    
                    $id = $_GET['id'];
                    $sql = "delete from role where id = $id";
                    $result = $conn->query($sql);
                    if($result == true){
                        echo "<script>
                        alert('Role has been delete successfully');
                        window.location.href = 'role_show.php';
                        </script>";
                    }
                include("footer.php");
?>
