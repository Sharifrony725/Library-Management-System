<?php
require_once 'header.php';
?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>

        </ul>
    </div>
</div>

<div class="row animated">
    <div class="col-sm-12">
        <div class="row">
            <?php $sql = "SELECT * FROM studests ";
            $students = mysqli_query($db_connect, $sql);
            $total_students = mysqli_num_rows($students);

            ?>


            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                    <a href="students.php">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?php echo $total_students; ?> </h1>
                            <h4 class="subtitle color-darker-1">Total Students</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!--BOX Style 2-->
            <?php $sql = "SELECT * FROM libarian ";
            $libarian = mysqli_query($db_connect, $sql);
            $total_libarian = mysqli_num_rows($libarian);

            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-light color-darker-2">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?php echo $total_libarian; ?> </h1>
                            <h4 class="subtitle color-darker-1">Total Libarian</h4>
                        </div>
                    </a>
                </div>
            </div>

            <!-- BOX Style 3-->
            <?php $sql = "SELECT * FROM books ";
            $books = mysqli_query($db_connect, $sql);
            $total_books = mysqli_num_rows($books);
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                    <a href="manage_book.php">
                        <div class="panel-content">
                            <h1 class="title color-light-1"> <i class="fa fa-book"></i> <?php echo $total_books ?> </h1>
                            <h4 class="subtitle">Total Books</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- BOX Style 4-->
            <?php $sql = "SELECT SUM(`book_quantity`)as total FROM books";
            $books_quantity = mysqli_query($db_connect, $sql);
            $total_books_quantity = mysqli_fetch_assoc($books_quantity);
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-lighter-2 color-dark">
                    <a href="manage_book.php">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?php echo $total_books_quantity['total'] ?> </h1>
                            <h4 class="subtitle">Books Quantity</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- BOX Style 5-->
            <?php $sql = "SELECT SUM(`available_quantity`)as total FROM books";
            $available_books_quantity = mysqli_query($db_connect, $sql);
            $total_available_books_quantity = mysqli_fetch_assoc($available_books_quantity);
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                    <a href="manage_book.php">
                        <div class="panel-content">
                            <h1 class="title color-light-1"> <i class="fa fa-book"></i> <?php echo $total_available_books_quantity['total'] ?> </h1>
                            <h4 class="subtitle">Available Quantity</h4>
                        </div>
                    </a>
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