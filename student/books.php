<?php
require_once 'header.php';
?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="books.php">Books</a></li>

        </ul>
    </div>
</div>

<div class="row animated">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-content">
                <form method="POST" action="">
                    <div class="row pt-md">
                        <div class="form-group col-sm-9 col-lg-10">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="book_name_search" id="lefticon" placeholder="Search" required>
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <div class="form-group col-sm-3  col-lg-2 ">
                            <button type="submit" name="book" class="btn btn-primary btn-block">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['book'])) {
        $book_name_search = $_POST['book_name_search'];
    ?>
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <?php
                    $result = mysqli_query($db_connect, "SELECT * FROM `books` WHERE `book_name` LIKE '%$book_name_search%'");
                    while ($row = mysqli_fetch_assoc($result)) { ?>


                        <div class="row">
                            <div class="col-sm-3 col-md-2">
                                <img width="150px" height="150px" src="../images/books/<?= $row['book_image'] ?>" alt="">
                                <h6><b>Name: <?= $row['book_name'] ?></b></h6>
                                <span><b>Available Quantity: <?= $row['available_quantity'] ?></b></span>
                            </div>
                        <?php } ?>
                        </div>

                </div>
            </div>
        </div>
    <?php  } else { ?>
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <?php
                    $result = mysqli_query($db_connect, "SELECT * FROM books");
                    while ($row = mysqli_fetch_assoc($result)) { ?>


                        <div class="row">
                            <div class="col-sm-3 col-md-2">
                                <img width="150px" height="150px" src="../images/books/<?= $row['book_image'] ?>" alt="">
                                <h6><b>Name: <?= $row['book_name'] ?></b></h6>
                                <span><b>Available Quantity: <?= $row['available_quantity'] ?></b></span>
                            </div>
                        <?php } ?>
                        </div>

                </div>
            </div>
        </div>
    <?php  } ?>


</div>
<?php
require_once 'footer.php';
?>