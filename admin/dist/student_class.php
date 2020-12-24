<?php
include 'php/database.php';

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
        $output = $row['annualCharges'];
    }
    echo $output;
}



?>

