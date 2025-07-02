<?php
include("header.php");
include("connection.php");


error_reporting(E_ALL);
ini_set('display_errors', 1);


if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Book ID is missing");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM books WHERE id = $id";
$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
    die("Book not found");
}

$book = $result->fetch_assoc();


if (isset($_POST['update'])) {
    $bookname    = trim($_POST['bookname']);
    $description = trim($_POST['description']);
    $price       = floatval($_POST['price']);
    $catid       = intval($_POST['c_id']);
    $authorid    = intval($_POST['a_id']);
    $newImage    = $_FILES['image']['name'];
    $tmp_image   = $_FILES['image']['tmp_name'];
    $upload_dir  = "images/books/";

    
    if (!empty($newImage)) {
        $imageName = time() . "_" . basename($newImage);
        $targetPath = $upload_dir . $imageName;
        move_uploaded_file($tmp_image, $targetPath);
    } else {
        // Use old image
        $imageName = $book['bookImage'];
    }


    $stmt = $conn->prepare("UPDATE books SET bookName=?, description=?, price=?, catId_FK=?, authId_FK=?, bookImage=? WHERE id=?");
    $stmt->bind_param("ssdissi", $bookname, $description, $price, $catid, $authorid, $imageName, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Book updated successfully!'); window.location.href = 'book_show.php';</script>";
    } else {
        echo "<script>alert('Update failed: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6">
                <h4>Edit Book</h4>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Book Name</label>
                            <input type="text" name="bookname" class="form-control" value="<?= htmlspecialchars($book['bookName']) ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="<?= htmlspecialchars($book['description']) ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($book['price']) ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Current Image</label><br>
                            <img src="images/books/<?= htmlspecialchars($book['bookImage']) ?>" width="100">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Change Image (optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Category</label>
                            <select name="c_id" class="form-control" required>
                                <option value="">Select Category</option>
                                <?php
                                $cat_q = $conn->query("SELECT * FROM category");
                                while ($cat = $cat_q->fetch_assoc()) {
                                    $selected = ($cat['id'] == $book['catId_FK']) ? 'selected' : '';
                                    echo "<option value='{$cat['id']}' $selected>{$cat['categoryName']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Author</label>
                            <select name="a_id" class="form-control" required>
                                <option value="">Select Author</option>
                                <?php
                                $auth_q = $conn->query("SELECT * FROM authors");
                                while ($auth = $auth_q->fetch_assoc()) {
                                    $selected = ($auth['id'] == $book['authId_FK']) ? 'selected' : '';
                                    echo "<option value='{$auth['id']}' $selected>{$auth['author_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" name="update" class="btn btn-success">Update Book</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>