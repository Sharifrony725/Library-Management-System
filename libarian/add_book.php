<?php
require_once 'header.php';

if (isset($_POST['add_book'])) {
    $book_name = $_POST['book_name'];
    $image = explode('.', $_FILES['book_image']['name']);
    $image_ext  = end($image);
    $image = date('Ymdhis.') . $image_ext;
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_quantity = $_POST['book_quantity'];
    $available_quantity = $_POST['available_quantity'];
    $libarian_username = $_SESSION['libarian_username'];

    $sql = "INSERT INTO books(book_name, book_image, book_author_name,book_publication_name,book_purchase_date, book_price,book_quantity, available_quantity, libarian_username) VALUES ('$book_name','$image','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_quantity','$available_quantity','$libarian_username')";
    $result = mysqli_query($db_connect, $sql);
    if ($result) {
        move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/' . $image);
        $message = "Book successfully added";
    } else {
        $error = "Book not added";
    }
}
?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li></i><a href="javascript:avoid(0)">Add Books</a></li>
        </ul>
    </div>
</div>

<div class="row animated">
    <div class="col-sm-6 col-sm-offset-3">
        <!-- success message -->
        <?php
        if (isset($message)) {
        ?>
            <div class="alert alert-success" role="alert">
                <?= $message ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <!-- Error message -->
        <?php
        if (isset($error)) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $error; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <h4 class="mb-lg text-center color-info text-bold text-capitalize">Add Books</h4>
                            <div class="form-group">
                                <label for="email2" class="col-sm-4 control-label">Book Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="book_name" id="email2" placeholder="Book Name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email2" class="col-sm-4 control-label">Book Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="book_image">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="book_author_name" class="col-sm-4 control-label">Book Author Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="book_author_name" id="book_author_name" placeholder="Book Author Name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="book_publication_name" class="col-sm-4 control-label">Book Publication Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="book_publication_name" id="book_publication_name" placeholder="Book Publication Name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="book_purchase_date" id="book_purchase_date	" placeholder="Book Purchase Date" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="book_price" class="col-sm-4 control-label">Book Price </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="book_price" id="book_price	" placeholder="Book Price" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="book_quantity" class="col-sm-4 control-label">Book Quantity</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="book_quantity" id="book_quantity" placeholder="Book Quantity" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="book_quantity" class="col-sm-4 control-label">Available Quantity</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="available_quantity" id="available_quantity" placeholder="Available Quantity" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" name="add_book" class="btn btn-primary"><i class="fa fa-book"> Add Book</i></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- RIGHT SIDEBAR -->
<!-- ========================================================= -->
<?php
require_once 'footer.php';
?>