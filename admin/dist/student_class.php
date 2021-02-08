<?php
include 'php/database.php';
include 'php/logedin.php';

if($_POST['type']=="students"){
    $class = $_POST['class'];
    $output = '<option value="">Select...</option>';
    $query = "SELECT * FROM `students` WHERE `class`='$class' ORDER BY `name` ASC";
    $result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    echo $output;
}
if($_POST['type']=="fees"){
    $fees = $_POST['fees'];
    $output = '';
    $query = "SELECT * FROM `students` WHERE `id`='$fees'";
    $result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        $output = $row['tutionFee'];
    }
    echo $output;
}
if($_POST['type']=="sports_fee"){
    $std_id = $_POST['std_id'];
    $output = '';
    $query = "SELECT * FROM `students` WHERE `id`='$std_id'";
    $result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        $output = $row['sportsCharg'];
    }
    echo $output;
}
if($_POST['type']=="annualCharges"){
    $std_id = $_POST['std_id'];
    $output = '';
    $query = "SELECT * FROM `students` WHERE `id`='$std_id'";
    $result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        $output = $row['annualCharg'];
    }
    echo $output;
}
if($_POST['type']=="reg_fees"){
    $std_id = $_POST['std_id'];
    $output = '';
    $query = "SELECT * FROM `students` WHERE `id`='$std_id'";
    $result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        $output = $row['reg_Charges'];
    }
    echo $output;
}
if($_POST['type']=="labCharges"){
    $std_id = $_POST['std_id'];
    $output = '';
    $query = "SELECT * FROM `students` WHERE `id`='$std_id'";
    $result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        $output = $row['lab_charges'];
    }
    echo $output;
}
if($_POST['type']=="other"){
    $id = $_POST['std'];
    $invoice_type = $_POST['value'];
    $output = '';
    $query = "SELECT * FROM `students` WHERE `id`='$id'";
    $result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        $output = $row[$invoice_type];
    }
    echo $output;
}
if($_POST['type']=="roll_no"){
    $fees = $_POST['fees'];
    $output = '';
    $query = "SELECT * FROM `students` WHERE `id`='$fees'";
    $result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        $output = $row['id'];
    }
    echo "100". $output;
}
if($_POST['type']=="lab"){
    $fees = $_POST['fees'];
    $output = '';
    $query = "SELECT * FROM `students` WHERE `id`='$fees'";
    $result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        $output = $row['lab_charges'];
    }
    echo $output;
}
if($_POST['type']=="annual"){
    $fees = $_POST['fees'];
    $output = '';
    $query = "SELECT * FROM `students` WHERE `id`='$fees'";
    $result = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        $output = $row['annualCharg'];
    }
    echo $output;
}
