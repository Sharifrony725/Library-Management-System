<?php
require_once '../db_conn.php';
session_start();
if (isset($_SESSION['student_login'])) {
    header('location:index.php');
}
if (isset($_POST['btn'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $roll = $_POST['roll'];
    $registration = $_POST['registration'];
    $phone = $_POST['phone'];
    $input_errors = array();
    if (empty($first_name)) {
        $input_errors['first_name'] = "First name field is required!";
    }
    if (empty($last_name)) {
        $input_errors['last_name'] = "Last name field is required!";
    }

    if (empty($email)) {
        $input_errors['email'] = "Email field is required!";
    }

    if (empty($password)) {
        $input_errors['password'] = "Password field is required!";
    }

    if (empty($username)) {
        $input_errors['username'] = "Username field is required!";
    }

    if (empty($roll)) {
        $input_errors['roll'] = "Roll field is required!";
    }

    if (empty($registration)) {
        $input_errors['registration'] = "Registration  field is required!";
    }

    if (empty($phone)) {
        $input_errors['phone'] = "Phone field is required!";
    }
    if (count($input_errors) == 0) {
        $sql = "SELECT * FROM studests WHERE  email = '$email'";
        $email_check =  mysqli_query($db_connect, $sql);
        $email_check_row = mysqli_num_rows($email_check);

        if ($email_check_row == 0) {
            $sql = "SELECT * FROM studests WHERE  username = '$username'";
            $username_check =  mysqli_query($db_connect, $sql);
            $username_check_row = mysqli_num_rows($username_check);
            if ($username_check_row == 0) {
                if (strlen($username) > 7) {
                    if (strlen($password) >= 6) {
                        $sql = "INSERT INTO studests(first_name, last_name,roll, registration, email, username, password, phone,status) VALUES ('$first_name','$last_name','$roll','$registration','$email','$username','$password','$phone','0')";
                        $query_result =  mysqli_query($db_connect, $sql);
                        if ($query_result) {
                            $message = "Registration Successfully";
                        } else {
                            $error =  "Something wrong!";
                        }
                    } else {
                        $password_error = "Password more than 6 characters";
                    }
                } else {
                    $username_exits = " username more than 8 characters.";
                }
            } else {
                $username_exits = "This username already exists.";
            }
        } else {
            $email_exits = "This email already exists.";
        }
    }
}
?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
    <div class="wrap">
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body animated slideInDown">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--LOGO-->
            <div class="logo">
                <h1 class="text-center">LMS</h1>
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

                <?php
                if (isset($email_exits)) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $email_exits; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>


                    </div>
                <?php } ?>

                <?php
                if (isset($username_exits)) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $username_exits; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>


                    </div>
                <?php } ?>

                <?php
                if (isset($password_error)) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $password_error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>


                    </div>
                <?php } ?>


            </div>
            <div class="box">
                <!--SIGN IN FORM-->
                <div class="panel mb-none">
                    <div class="panel-content bg-scale-0">
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?= isset($first_name) ? $first_name : '' ?>">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php
                                if (isset($input_errors['first_name'])) {
                                    echo '<span class="input_errors">' . $input_errors['first_name'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?= isset($last_name) ? $last_name : '' ?>">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php
                                if (isset($input_errors['last_name'])) {
                                    echo '<span class="input_errors">' . $input_errors['last_name'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= isset($email) ? $email : '' ?>">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <?php
                                if (isset($input_errors['email'])) {
                                    echo '<span class="input_errors">' . $input_errors['email'] . '</span>';
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <i class="fa fa-key"></i>
                                </span>
                                <?php
                                if (isset($input_errors['password'])) {
                                    echo '<span class="input_errors">' . $input_errors['password'] .
                                        '</span>';
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?= isset($username) ? $username : '' ?>">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php
                                if (isset($input_errors['username'])) {
                                    echo '<span class="input_errors">' . $input_errors['username'] . '</span>';
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="roll" pattern="[0-9]{6}" placeholder="Roll" value="<?= isset($roll) ? $roll : '' ?>">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php
                                if (isset($input_errors['roll'])) {
                                    echo '<span class="input_errors">' . $input_errors['roll'] . '</span>';
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="registration" pattern="[0-9]{6}" placeholder="Registration No" value="<?= isset($registration) ? $registration : '' ?>">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php
                                if (isset($input_errors['registration'])) {
                                    echo '<span class="input_errors">' . $input_errors['registration'] . '</span>';
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="phone" pattern="01[3|5|8|7|9|6|4][0-9]{8}" placeholder="01*********" value="<?= isset($phone) ? $phone : '' ?>">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php
                                if (isset($input_errors['phone'])) {
                                    echo '<span class="input_errors">' . $input_errors['phone'] . '</span>';
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <input name="btn" value="Submit" type="submit" class="btn btn-primary btn-block">
                            </div>
                            <div class="form-group text-center">
                                Have an account? <a href="signin.php">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="../assets/javascripts/template-script.min.js"></script>
    <script src="../assets/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
</body>



</html>