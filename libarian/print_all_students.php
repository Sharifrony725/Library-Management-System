<?php require_once '../db_conn.php';
$result = mysqli_query($db_connect, "SELECT * FROM `studests`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print All Students</title>
    <style type="text/css">
        body {
            margin: 0;
            font-family: kalpurush;
        }

        .print_area {
            width: 755px;
            height: 1050px;
            margin: auto;
            box-sizing: border-box;
            page-break-after: always;
        }

        .header,
        .page-info {
            text-align: center;
        }

        .header h3 {
            margin: 0;

        }

        .data-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-info table th,
        .data-info table td {
            border: 1px solid black;
            padding: 4px;
            line-height: 1em;
        }
    </style>
</head>
<!-- onload="window.print() -->

<body onload="window.print()">
    <?php
    //echo page_header();
    $si = 1;
    $page = 1;
    $total = mysqli_num_rows($result);
    $par_page = 2;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($si % $par_page == 1) {
            echo page_header();
        }
    ?>
        <tr>
            <td><?= $si; ?></td>
            <td><?= $row['roll'] ?></td>
            <td><?= $row['registration'] ?></td>
            <td><?= ucwords($row['first_name']) . ' ' . ucwords($row['last_name']) ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>


        </tr>
    <?php
        if ($si % $par_page == 0 || $total == $par_page) {
            echo page_footer($page++);
        }
        $si++;
    }
    ?>

    <?php //echo page_footer(); 
    ?>
</body>

</html>
<?php
function page_header()
{
    $data = '
    <div class="print_area">
        <div class="header">
            <h3>Libary Management Systemt</h3>
            <h3>Dhaka,Bangladesh</h3>
        </div>
        <div class="data-info">
            <table>
                <thead>
                    <th>SI No</th>
                    <th>Roll No</th>
                    <th>Registration No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                   
                </thead>
    ';
    return $data;
}
function page_footer($page)
{
    $data = '
     </table>
    <div class="page-info">
        page :- ' . $page . '
    </div>
    </div>
    </div>
    ';
    return $data;
}
?>