<?php

$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'php/database.php';
    $user_name = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `username`='$user_name'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();


                $_SESSION['logedin'] = true;
                header('location: /schoolManagementSystem/admin/dist/index.php');
            } else {
                $showError = " Invalid Credentials";
            }
        }
    }
    // }
    else {
        $showError = " Invalid Credentials";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Dar ul Islah</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<style>
    .password span{
    position: relative;
    float: right;
    right: 12px;
    top: -35px;
    }
</style>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <?php
                if ($login) {

                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                          <strong>Contratulations!</strong> You are Loged In.
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span></button>
                          </div>";
                }
                if ($showError) {

                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                          <strong>Error!</strong>" . $showError . ".
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                          </button>
                          </div>";
                }
                ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">DAR-UL-ISLAH ACADEMY</h3>
                                </div>
                                <div class="card-body">
                                    <form action="login.php" method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email" name="user" placeholder="Enter email address" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <div class="password">

                                                <input class="form-control py-4" id="Password" type="password" name="password" placeholder="Enter password" />
                                                <span>
                                                    <i class="fa fa-eye" aria-hidden="true" type="button" id="eye" onclick="display()" ></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="reset.php">Forgot Password?</a>
                                            <input type="submit" value="Login" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; M. Emmad Sadiq</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        function show() {
            var p = document.getElementById('Password');
            p.setAttribute('type', 'text');
        }

        function hide() {
            var p = document.getElementById('Password');
            p.setAttribute('type', 'password');
        }

        var pwShown = 0;
        function display(){
             if (pwShown == 0) {
                pwShown = 1;
                show();
            } else {
                pwShown = 0;
                hide();
            }
        }
    </script>
</body>

</html>