<?php
require_once 'header.php';
?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li></i><a href="javascript:avoid(0)">Manage Books</a></li>

        </ul>
    </div>
</div>
<div class="row animated">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Books</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>

                            <tr>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Author Name</th>
                                <th>Publication Name</th>
                                <th>Purchase Date</th>
                                <th>Book Price</th>
                                <th>Book Quantity</th>
                                <th>Available Quantity</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM books";
                            $result = mysqli_query($db_connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) { ?>

                                <tr>
                                    <td><?= $row['book_name'] ?></td>

                                    <td><img width="50px" src="../images/books/<?= $row['book_image'] ?>" alt="<?= $row['book_image'] ?>"></td>

                                    <td><?= $row['book_author_name'] ?></td>

                                    <td><?= $row['book_publication_name'] ?></td>

                                    <td><?= date('d-m-Y', strtotime($row['book_purchase_date'])) ?></td>

                                    <td><?= $row['book_price'] ?></td>

                                    <td><?= $row['book_quantity'] ?></td>

                                    <td><?= $row['available_quantity'] ?></td>
                                    <td>
                                        <a href="javascript:avoid(0)" title="View" data-toggle="modal" data-target="#book-<?= $row['id']; ?>" class=" btn btn-info"><i class="fa fa-eye"></i></a>

                                        <a href="" title="Edit" data-toggle="modal" data-target="#book-update-<?= $row['id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>

                                        <a href="delete.php?bookDelete=<?= base64_encode($row['id']) ?>" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<?php
$sql = "SELECT * FROM books";
$result = mysqli_query($db_connect, $sql);
while ($row = mysqli_fetch_assoc($result)) { ?>

    <div class="modal fade" id="book-<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-default-label"> <i class="fa fa-book" aria-hidden="true"></i> Book Info</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped" width="100%">
                        <tr>
                            <th>Book Name</th>
                            <td><?= $row['book_name'] ?></td>
                        </tr>

                        <tr>
                            <th>Book Image</th>
                            <td><img width="50px" src="../images/books/<?= $row['book_image'] ?>" alt="<?= $row['book_image'] ?>"></td>
                        </tr>

                        <tr>
                            <th>Author Name</th>
                            <td><?= $row['book_author_name'] ?></td>
                        </tr>

                        <tr>
                            <th>Publication Name</th>
                            <td><?= $row['book_publication_name'] ?></td>
                        </tr>

                        <tr>
                            <th>Purchase Date</th>
                            <td><?= date('d-m-Y', strtotime($row['book_purchase_date'])) ?></td>
                        </tr>

                        <tr>
                            <th>Book Price</th>
                            <td><?= $row['book_price'] ?></td>
                        </tr>

                        <tr>
                            <th>Book Quantity</th>
                            <td><?= $row['book_quantity'] ?></td>
                        </tr>

                        <tr>
                            <th>Available Quantity</th>
                            <td><?= $row['available_quantity'] ?></td>
                        </tr>


                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php  } ?>
<!-- edit -->
<?php
//$id = $row['id'];
$sql = "SELECT * FROM books";
$result = mysqli_query($db_connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $book_info = mysqli_query($db_connect, "SELECT * FROM books WHERE id = '$id'");
    $book_info_row = mysqli_fetch_assoc($book_info);
?>
    <div class="modal fade" id="book-update-<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-default-label"> <i class="fa fa-book" aria-hidden="true"></i>Update Book Info</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">

                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="email2" class="col-sm-4 control-label">Book Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="book_name" value="<?= $book_info_row['book_name'] ?>">
                                                <input type="hidden" class="form-control" name="id" value="<?= $book_info_row['id'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_author_name" class="col-sm-4 control-label">Book Author Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="book_author_name" value="<?= $book_info_row['book_author_name'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_publication_name" class="col-sm-4 control-label">Book Publication Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="book_publication_name" value="<?= $book_info_row['book_publication_name'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="book_purchase_date" value="<?= $book_info_row['book_purchase_date'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_price" class="col-sm-4 control-label">Book Price </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="book_price" value="<?= $book_info_row['book_price'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_quantity" class="col-sm-4 control-label">Book Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="book_quantity" value="<?= $book_info_row['book_quantity'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_quantity" class="col-sm-4 control-label">Available Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="available_quantity" value="<?= $book_info_row['available_quantity'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button type="submit" name="update_book" class="btn btn-primary"><i class="fa fa-book"> Update Book</i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
<!-- update query -->

<?php
if (isset($_POST['update_book'])) {
    $book_name = $_POST['book_name'];
    $id = $_POST['id'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_quantity = $_POST['book_quantity'];
    $available_quantity = $_POST['available_quantity'];
    $sql = "UPDATE books SET book_name='$book_name',book_author_name='$book_author_name',book_publication_name='$book_publication_name',book_purchase_date='$book_purchase_date',book_price='$book_price', book_quantity='$book_quantity',available_quantity='$available_quantity' WHERE id = '$id'";
    $result = mysqli_query($db_connect, $sql);
    if ($result) { ?>
        <script>
            alert('Book Update Successfull!');
            javascript: history.go(-1);
        </script>
    <?php  } else { ?>
        <script>
            alert('Book Not Update');
        </script>
<?php    }
}
?>

<!-- RIGHT SIDEBAR -->
<!-- ========================================================= -->
<?php
require_once 'footer.php';
?>