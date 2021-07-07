<?php require_once 'header.php' ?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <!-- <li></i><a href="javascript:avoid(0)">Students</a></li> -->

        </ul>
    </div>
</div>

<div class="row animated">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Issue Book</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Book Issue Date</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $student_id = $_SESSION['student_id'];
                            $sql = "SELECT issue_book.book_issue_date,books.book_name,books.book_image
                            FROM books
                            INNER JOIN issue_book ON issue_book. book_id = books.id	
                            WHERE issue_book.student_id = '$student_id'";
                            $result = mysqli_query($db_connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= $row['book_name'] ?></td>
                                    <td><img width="50px" src="../images/books/<?= $row['book_image'] ?>" alt="<?= $row['book_image'] ?>">
                                    </td>
                                    <td><?= $row['book_issue_date'] ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

<?php require_once 'footer.php' ?>