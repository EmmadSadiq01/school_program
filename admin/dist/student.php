<?php
include 'php/database.php';
include 'php/logedin.php';

// global initialize variable for use in edit student record
$roll_no = "";
$gr_no = "";
$std_name = "";
$nationality = "";
$religion = "";
$gender = "";
$dob = "";
$class = "";
$session = "";
$address = "";
$fname = "";
$fcnic = "";
$foccupation = "";
$feducation = "";
$mname = "";
$mcnic = "";
$moccupation = "";
$meducation = "";
$fnumber = "";
$mnumber = "";
$doj = "";
$add_fees = "";
$tutionFee = "";
$annualCharges = "";
$placeOfBirth = "";
$institute = "";

// Delete student
if (isset($_GET['delete'])) {
  $del_id = $_GET['delete'];
  $sql = "DELETE FROM `students` WHERE `students`.`id` = '$del_id'";
  $result = mysqli_query($connection, $sql);
}


// edit studentt data 
if (isset($_POST["edit_std"])) {

  $edit_id = $_POST['edit_std'];

  $gr_no = $_POST['gr_no'];
  $std_name = $_POST['sname'];
  $nationality = $_POST['nationality'];
  $religion = $_POST['religion'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $class = $_POST['class'];
  $session = $_POST['session'];
  $address = $_POST['address'];
  $fname = $_POST['fname'];
  $fcnic = $_POST['fcnic'];
  $foccupation = $_POST['foccupation'];
  $feducation = $_POST['feducation'];
  $mname = $_POST['mname'];
  $mcnic = $_POST['mcnic'];
  $moccupation = $_POST['moccupation'];
  $meducation = $_POST['meducation'];
  $fnumber = $_POST['fnumber'];
  $mnumber = $_POST['mnumber'];
  $dateofjoin = $_POST['dateofjoin'];
  $admissionFee = $_POST['admissionFee'];
  $tutionFee = $_POST['tutionFee'];
  $annualCharges = $_POST['annualCharges'];
  $institute = $_POST['institute'];
  $placeOfBirth = $_POST['placeOfBirth'];
  $labCharges = $_POST['labCharges'];
  $reg_Charges = $_POST['reg_Charges'];
  $sportsCharg = $_POST['sportsCharg'];

  $sql = "UPDATE `students` SET  `gr_no`='$gr_no', `name`= '$std_name',`nationality` = '$nationality',`religion` ='$religion',`gender`='$gender',`dob`='$dob',`class`='$class',`session`='$session',`address`='$address',
  `fname`='$fname',`fcnic`='$fcnic',`foccupation`='$foccupation',`feducation`='$feducation',`mname`='$mname',`mcnic`='$mcnic',`moccupation`='$moccupation',`meducation`='$meducation',`fnumber`='$fnumber',`mnumber`='$mnumber',
  `doj`='$dateofjoin',`add_fees`='$admissionFee',`tutionFee`='$tutionFee',`annualCharg`='$annualCharges', `institute`='$institute',`place_of_birth`='$placeOfBirth', `lab_charges`='$labCharges',
  `reg_Charges`='$reg_Charges',`sportsCharg`='$sportsCharg' WHERE `students`.`id` = '$edit_id'";


  $result = mysqli_query($connection, $sql);
}

// add new record
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST["edit_std"])) {
  $gr_no = $_POST['gr_no'];
  $std_name = $_POST['sname'];
  $nationality = $_POST['nationality'];
  $religion = $_POST['religion'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $class = $_POST['class'];
  $session = $_POST['session'];
  $address = $_POST['address'];
  $fname = $_POST['fname'];
  $fcnic = $_POST['fcnic'];
  $foccupation = $_POST['foccupation'];
  $feducation = $_POST['feducation'];
  $mname = $_POST['mname'];
  $mcnic = $_POST['mcnic'];
  $moccupation = $_POST['moccupation'];
  $meducation = $_POST['meducation'];
  $fnumber = $_POST['fnumber'];
  $mnumber = $_POST['mnumber'];
  $dateofjoin = $_POST['dateofjoin'];
  $admissionFee = $_POST['admissionFee'];
  $tutionFee = $_POST['tutionFee'];
  $annualCharges = $_POST['annualCharges'];
  $institute = $_POST['institute'];
  $placeOfBirth = $_POST['placeOfBirth'];
  $labCharges = $_POST['labCharges'];
  $reg_Charges = $_POST['reg_Charges'];
  $sportsCharg = $_POST['sportsCharg'];

  $img_dir = $_FILES["image"]["name"];
  $temp = $_FILES["image"]["tmp_name"];
  $folder = "images/" . $img_dir;
  move_uploaded_file($temp, $folder);


  $sql = "INSERT INTO `students`
   (`name`,`gr_no`,`nationality`,`religion`,`gender`,`dob`,`class`,`session`,`address`,
  `fname`,`fcnic`,`foccupation`,`feducation`,`mname`,`mcnic`,`moccupation`,`meducation`,`fnumber`,`mnumber`,
  `doj`,`add_fees`,`tutionFee`,`annualCharg`,`institute`,`place_of_birth`,`lab_charges`,`img_dir`,`reg_Charges`,`sportsCharg`)
   VALUES 
   ('$std_name','$gr_no','$nationality','$religion','$gender','$dob','$class','$session','$address','$fname','$fcnic','$foccupation'
    ,'$feducation','$mname','$mcnic','$moccupation','$meducation','$fnumber','$mnumber','$dateofjoin','$admissionFee','$tutionFee',
    '$annualCharges','$institute','$placeOfBirth','$labCharges','$img_dir','$reg_Charges','$sportsCharg')";
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
</head>

<body class="sb-nav-fixed">

  <?php
  require 'includes/navbar.php';
  require 'includes/sidebar.php';
  $action = '';
  require 'includes/student_side_content.php';
  ?>



  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>

  <script>
    var input = document.querySelectorAll('.js-date')[0];

    // var dateInputMask = function dateInputMask(elm) {
    //   elm.addEventListener('keypress', function(e) {
    //     if (e.keyCode < 47 || e.keyCode > 57) {
    //       e.preventDefault();
    //     }

    //     var len = elm.value.length;
    //     if (len !== 1 || len !== 3) {
    //       if (e.keyCode == 47) {
    //         e.preventDefault();
    //       }
    //     }

    //     // If they don't add the slash, do it for them...
    //     if (len === 2) {
    //       elm.value += '/';
    //     }

    //     // If they don't add the slash, do it for them...
    //     if (len === 5) {
    //       elm.value += '/';
    //     }
    //   });
    // };

    // dateInputMask(input);
    deletes = document.getElementsByClassName("del");
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        sno = e.target.id.substr(1, );

        if (confirm("do you want to delete the record?")) {
          console.log("yes")
          window.location = `/schoolManagementSystem/admin/dist/student.php?delete=${sno}`;
        } else {
          console.log("no")
        }

      })
    })
  </script>



</body>

</html>