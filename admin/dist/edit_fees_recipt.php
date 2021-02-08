<?php
include 'php/database.php';
include 'php/logedin.php';

if (isset($_POST['save']) && isset($_POST['month'])) {
    // $update_id=$_POST['update_id'];
    $id = $_POST['save'];

    // echo $id.'<br/>';
    // echo $id.'<br/>';
    // echo $id.'<br/>';
    // echo $id.'<br/>';
    // echo $id.'<br/>';

    $month = $_POST['month'];
    $sql_update = "UPDATE balance SET months='$month' WHERE id_bal='$id'  ";
    $result = mysqli_query($connection, $sql_update);
}

if (isset($_POST['save']) && isset($_POST['other'])) {
    // $update_id=$_POST['update_id'];
    $id = $_POST['save'];

    // echo $id.'<br/>';
    // echo $id.'<br/>';
    // echo $id.'<br/>';
    // echo $id.'<br/>';
    // echo $id.'<br/>';

    $other = substr($_POST['other'], 0, 11);
    $amount = $_POST['fees'];
    if($other == "lab_charges"){
    $sql_update = "UPDATE balance SET invoice_type='$other', amount='$amount', months='lab_charges' WHERE id_bal='$id'  ";
    $result = mysqli_query($connection, $sql_update);}
    if($other == "annualCharg"){
    $sql_update = "UPDATE balance SET invoice_type='$other', amount='$amount', months='annualCharg' WHERE id_bal='$id'  ";
    $result = mysqli_query($connection, $sql_update);}
    if($other == "reg_Charges"){
    $sql_update = "UPDATE balance SET invoice_type='$other', amount='$amount', months='registration fees' WHERE id_bal='$id'  ";
    $result = mysqli_query($connection, $sql_update);}
    if($other == "sportsCharg"){
    $sql_update = "UPDATE balance SET invoice_type='$other', amount='$amount', months='sports fees' WHERE id_bal='$id'  ";
    $result = mysqli_query($connection, $sql_update);
    }
}


if (isset($_POST['del'])) {
    $id = $_POST['del'];
    $sql  = "DELETE FROM `balance` WHERE `balance`.`id_bal` = '$id'";
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
    <title>Dashboard - Fees</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<style>
    .page_header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    a.btn.btn-outline-primary,
    a.btn.btn-outline-success {
        width: 150px;
        margin-bottom: 10px;
    }
</style>

<body class="sb-nav-fixed">

    <?php
    require 'includes/navbar.php';
    require 'includes/sidebar.php';
    require 'includes/edit_fees_recipt.php';
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
        // function student_class(std_class) {
        //     $.ajax({
        //         url: "student_class.php",
        //         method: "POST",
        //         data: {
        //             type: "students",
        //             class: std_class
        //         },
        //         success: function(data) {
        //             $('#students_list').html(data)
        //         }
        //     })
        // }

        // function tutionFees(value) {
        //     $.ajax({
        //         url: "student_class.php",
        //         method: "POST",
        //         data: {
        //             type: "fees",
        //             fees: value
        //         },
        //         success: function(data) {
        //             $('#fees').val(data)
        //             cal_advance()
        //             discount_val()
        //         }
        //     })
        //     $.ajax({
        //         url: "student_class.php",
        //         method: "POST",
        //         data: {
        //             type: "roll_no",
        //             fees: value
        //         },
        //         success: function(data) {
        //             $('#roll_no').val(data)
        //             cal_advance()
        //             discount_val()
        //         }
        //     })
        // }

        function other_fees(std_id) {
            id = std_id.slice(6)
            $.ajax({
                url: "student_class.php",
                method: "POST",
                data: {
                    type: "other",
                    std: id,
                    value: $('#' + std_id).val().slice(0, 11)
                },
                success: function(data) {
                    $('#fees_' + $('#' + std_id).val().slice(11)).val(data)
                }
            })
            console.log($('#' + std_id).val().slice(0, 11))
            console.log($('#' + std_id).val().slice(11))
        }
    </script>