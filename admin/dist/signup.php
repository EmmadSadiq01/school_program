<?php

$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    include 'php/database.php';

    $user_name = $_POST['user']; 
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $exist = false;
    $existsql = "SELECT * FROM `user` where `username` = '$user_name'";
    $result = mysqli_query($connection, $existsql);
    $user_exist =  mysqli_num_rows($result);

    if ($user_exist > 0) {
        $showError = " User Already Exist";
    } else {

        if (($password == $cpassword) || $exist = false) {
            
            $hash = password_hash("$password", PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`username`, `password`) VALUES ('$user_name', '$hash')";
            $result = mysqli_query($connection, $sql);
            
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "Passwors do not match";
        }
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
    <title>Signup - Dar ul Islah</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <?php
                if ($showAlert) {

                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Contratulations!</strong> Your Account has been created successfull.
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
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form action="signup.php" method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="user" placeholder="user@dar-ul-islah.com" />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                    <input class="form-control py-4" id="inputConfirmPassword" type="password" name="cpassword" placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" value="Create Account" class="btn btn-primary btn-block">
                                        <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="signup.php">Create Account</a></div> -->
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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
                        <div class="text-muted">Copyright &copy; Emmad Sadiq</div>
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
</body>

</html>