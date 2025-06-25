<?php include("header.php"); ?>
<?php include("conn.php");?>

<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="name" name="name" class="form-control" placeholder="Price">
                            </div><div class="form-group col-md-6">
                                <label>Discription</label>
                                <input type="description" name="discription" class="form-control" placeholder="Price">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Price">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" placeholder="Image">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Category</label>
                                <select id="inputState" class="form-control" name="cid">
                                    <?php
                                    $sql = "select * from category";
                                    $result = $conn->query($sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id'] . '">' . $row['categoryName'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Authors</label>
                                <select id="inputState" class="form-control" name="aid">
                                    <?php
                                    $sql = "select * from authors";
                                    $result = $conn->query($sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id'] . '">' . $row['author_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Add Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])){
    $bookname = $_POST['bookname'];
    $discription = $_POST['discription'];
    $price = $_POST['price'];
    $cid = $_POST['cid'];
    $aid = $_POST['aid'];

    $sql = "insert into books (bookName, discription, price, catId_FK, authId_FK, bookImage) 
            values ('$bookname', '$dscription', '$price', '$cid', '$aid', '$image')";
    $result = $conn->query($sql);
    
    // File upload
    if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];
        $file_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($file_tmp, "images/books/" .$file_name);
        $image = $file_name;
   
    }
    if ($result === true){
        echo "<script>
         alert('Book Has Been Registered!');
         </script>";
    }
}

include("footer.php");
?>