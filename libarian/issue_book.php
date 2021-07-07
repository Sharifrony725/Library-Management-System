<?php
require_once 'header.php';
if (isset($_POST['issue_book'])) {
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $book_issue_date = $_POST['book_issue_date'];
    $sql = "INSERT INTO issue_book(student_id, book_id, book_issue_date) VALUES ('$student_id','$book_id','$book_issue_date')";
    $result = mysqli_query($db_connect, $sql);

    if ($result) {
        mysqli_query($db_connect, "UPDATE books SET available_quantity = available_quantity-1 WHERE id= '$book_id'");
?>
        <script>
            alert('Book Issue Successfull!');
        </script>
    <?php  } else { ?>
        <script>
            alert('Book Issue Failed!');
        </script>
<?php    }
}
?>

<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li></i><a href="javascript:avoid(0)">Issue Book</a></li>


        </ul>
    </div>
</div>

<div class="row animated">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline" action="" method="POST">

                            <div class="form-group">
                                <select name="student_id" class="form-control">
                                    <option>Select</option>
                                    <?php
                                    $sql = "SELECT * FROM `studests` WHERE status = 1 ";
                                    $result = mysqli_query($db_connect, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                        <option value="<?= $row['id'] ?>"><?= $row['first_name'] . ' ' . $row['last_name'] . '(' . $row['roll'] . ')' ?></option>

                                    <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="btn" class="btn btn-primary">search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if (isset($_POST['btn'])) {
                    $id = $_POST['student_id'];
                    $sql = "SELECT * FROM studests WHERE id ='$id' AND status = 1 ";
                    $result = mysqli_query($db_connect, $sql);
                    $row = mysqli_fetch_assoc($result); ?>

                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="POST">

                                        <div class="form-group">
                                            <label for="student_name"> Student Name</label>
                                            <input type="name" name="student_id" class="form-control" id="name" value="<?= $row['first_name'] . ' ' . $row['last_name'] ?>" readonly>
                                            <input type="hidden" value="<?= $row['id'] ?>" name="student_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_name">Book Name</label>

                                            <select name="book_id" class="form-control">
                                                <option>Select</option>
                                                <?php
                                                $sql = "SELECT * FROM books WHERE available_quantity > 0 ";
                                                $result = mysqli_query($db_connect, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>

                                                    <option value="<?= $row['id'] ?>"><?= $row['book_name']  ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="book_name">Book Issue Date</label>
                                            <input name="book_issue_date" class="form-control" type="text" value="<?= date('d-m-Y') ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <button name="issue_book" type="submit" class="btn btn-primary">Save Issue Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>


</div>


<!-- RIGHT SIDEBAR -->
<!-- ========================================================= -->
<?php
require_once 'footer.php';
?>