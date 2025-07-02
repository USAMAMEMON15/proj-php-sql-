<?php
include("header.php");
include("conn.php");


error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All Books</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark">
                        <thead class="table text-dark">
                            <tr>
                                <th>Id</th>
                                <th>Book Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $sql = "SELECT 
                                        b.id, 
                                        b.bookName, 
                                        b.description, 
                                        b.price, 
                                        c.categoryName, 
                                        a.author_name, 
                                        b.bookImage 
                                    FROM books b
                                    LEFT JOIN category c ON b.catId_FK = c.id
                                    LEFT JOIN authors a ON b.authId_FK = a.id
                                    ORDER BY b.id DESC";

                            $result = $conn->query($sql);
                            $i = 1;

                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $i++ . "</td>";
                                    echo "<td>" . htmlspecialchars($row['bookName']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                    echo "<td>Rs. " . number_format($row['price'], 2) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['categoryName']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['author_name']) . "</td>";
                                    echo "<td><img src='images/books/" . htmlspecialchars($row['bookImage']) . "' width='80' height='100'></td>";
                                    echo "<td>
                                            <a href='book_edit.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                          </td>";
                                    echo "<td>
                                            <a href='book_delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this book?');\">Delete</a>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center'>No Books Found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>