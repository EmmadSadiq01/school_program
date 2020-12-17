<?php
include 'php/database.php';
include 'php/database.php';

// Delete student
if(isset($_GET['delete'])){
    $del_id=$_GET['delete'];
    $sql = "DELETE FROM `teacher` WHERE `teacher`.`id` = '$del_id'";
    $result = mysqli_query($connection,$sql);
  }


// update staff
if (isset($_POST["edit_teacher"])){

    $edit_teacher = $_POST["edit_teacher"];

    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];
    $address = $_POST['address'];
    $refrence = $_POST['ref_tech'];
    $qualification = $_POST['degree'];
    $year = $_POST['passing_year'];
    $course = $_POST['for_course'];
    $salary = $_POST['salary'];
    $post = $_POST['post'];

    $sql = "UPDATE `teacher` SET `name` ='$name', `email`='$email', `gender`='$gender', `dob`='$dob', `doj`='$doj', `address`='$address', `refrence`='$refrence',`qualification`='$qualification', `year`='$year', `course`='$course', `salary`='$salary',`contact`='$contact',`post`='$post' WHERE id='$edit_teacher'";
    $result = mysqli_query($connection, $sql);

}

//   add new staff
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST["edit_teacher"]) ) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $doj = $_POST['doj'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $ref = $_POST['ref_tech'];
    $email = $_POST['email'];
    $degree = $_POST['degree'];
    $post = $_POST['post'];
    $passing_year = $_POST['passing_year'];
    $for_course = $_POST['for_course'];
    $salary = $_POST['salary'];

    $img_dir = $_FILES["image"]["name"];
    $temp = $_FILES["image"]["tmp_name"];
    $folder = "images/".$img_dir;
    move_uploaded_file($temp,$folder); 


    $sql = "INSERT INTO `teacher` (`name`, `email`, `gender`, `dob`, `doj`, `address`, `refrence`, `photo`, `qualification`, `year`, `course`, `salary`,`contact`,`post`)  VALUES ('$name', '$email','$gender','$doj','$dob','$address','$ref','$img_dir','$degree','$passing_year','$for_course','$salary','$contact','$post')";
    $result = mysqli_query($connection, $sql);

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
    <title>Dashboard - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/student.css" rel="stylesheet" />



    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<style>
     .page_header{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>
<body>
<?php
    require 'includes/navbar.php';
    require 'includes/sidebar.php';
    $action="";
    require 'includes/teacher_side.php';
    ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
    <script src="assets/demo/datatables-demo.js"></script>
    <script>
         deletes = document.getElementsByClassName("del");
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            sno = e.target.id.substr(1, );

            if (confirm("do you want to delete the record?")) {
                console.log("yes")
                window.location = `/schoolManagementSystem/admin/dist/teacher.php?delete=${sno}`;
            } else {
                console.log("no")
            }

        })
    })
    </script>

</body>
</html>