<?php
$reset = false;
$showError = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'php/database.php';
    $user_name = $_POST['user_name'];
    $old_password = $_POST['oldpassword'];
    $new_password = $_POST['newpassword'];
    $confirm_password = $_POST['cpassword'];

    $sql = "SELECT * FROM `user` WHERE `user`.`username`='$user_name'";
    $result1 = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result1);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result1)) {
            if (password_verify($old_password, $row['password'])) {
                if ($new_password == $confirm_password) {
                    $hash = password_hash("$new_password", PASSWORD_DEFAULT);
                    $sql = "UPDATE `user` SET `password` = '$hash' WHERE `user`.`username` = '$user_name'";
                    $result = mysqli_query($connection, $sql);
                    if ($result) {
                        $reset = true;
                    }
                } else {
                    $showError = " Password not same";
                }
            } else {
                $showError = " Invalid Credentials";
            }
        }
    } else {
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
    <title>Change Password- Dar ul Islah</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <?php
                 if ($reset) {

                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Contratulations!</strong> Password has been set.
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span></button>
                      </div>";
                }
                if ($showError) {
            
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Contratulations!</strong> ". $showError ."
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span></button>
                      </div>";
                }
                ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Change Password</h3>
                                </div>
                                <div class="card-body">
                                    <form action="reset.php" method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email" name="user_name" aria-describedby="emailHelp" placeholder="Enter email address" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Old Password</label>
                                            <div class="password">

                                                <input class="form-control py-4" id="Password" type="password" name="oldpassword" placeholder="Enter password" />
                                                <!-- <span>
                                                    <i class="fa fa-eye" aria-hidden="true" type="button" id="eye" onclick="display()"></i>
                                                </span> -->
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" id="inputPassword" type="password" name="newpassword" placeholder="Enter password" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                    <input class="form-control py-4" id="inputConfirmPassword" type="password" name="cpassword" placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="login.php">Return to login</a>
                                            <input type="submit" value="Reset Password" class="btn btn-primary">
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