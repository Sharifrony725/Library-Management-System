<?php require_once 'header.php' ?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li></i><a href="javascript:avoid(0)">Return Books</a></li>

        </ul>
    </div>
</div>

<div class="row animated">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Return Books</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Phone</th>
                                <th>Book Name</th>
                                <th>Book Issue Date</th>
                                <th>Return Book</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT issue_book.id,issue_book.book_id, issue_book.book_issue_date,studests.first_name,studests.last_name,studests.roll,studests.phone,
                            books.book_name,books.book_image
                            FROM issue_book 
                            INNER JOIN studests ON studests.id = issue_book.student_id
                            INNER JOIN books ON books.id = issue_book.book_id
                            WHERE issue_book.book_return_date =''";
                            $result = mysqli_query($db_connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) { ?>

                                <tr>
                                    <td><?= ucwords($row['first_name'] . ' ' . $row['last_name']) ?></td>
                                    <td><?= $row['roll'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><?= $row['book_name'] ?></td>

                                    <td><?= $row['book_issue_date'] ?></td>
                                    <td><a href="return_book.php?id=<?= $row['id'] ?>&book_id=<?= $row['book_id'] ?>" class="btn btn-primary">Return Book</a></td>


                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

<?php if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $book_id = $_GET['book_id'];
    $date = date('d-m-Y');
    $sql = "UPDATE issue_book SET book_return_date ='$date' WHERE id='$id' ";
    $result = mysqli_query($db_connect, $sql);
    if ($result) {
        mysqli_query($db_connect, "UPDATE books SET available_quantity = available_quantity+1 WHERE id= '$book_id'");
?>
        <script>
            alert('Book Return Successfully!');
            javascript: history.go(-1);
        </script>
    <?php  } else { ?>
        <script>
            alert('Book Return Failed!');
        </script>
<?php    }
} ?>

<?php require_once 'footer.php' ?>