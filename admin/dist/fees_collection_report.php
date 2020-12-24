<?php
include 'php/database.php';

$to = "";
$from = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = $_POST['to'];
    $from = $_POST['from'];
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

<body class="sb-nav-fixed">

    <?php
    require 'includes/navbar.php';
    require 'includes/sidebar.php';
    require 'includes/fees_collection_report.php';
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
        // var today = new Date();
        // document.getElementById('to').defaultValue = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
        var amount = 0;
        $('.amount').each(function() {
            amount += parseFloat($(this).text());
        });
        document.getElementById("total_amount").innerHTML = amount;
        var discount = 0;
        $('.discount').each(function() {
            discount += parseFloat($(this).text());
        });
        document.getElementById("discount").innerHTML = discount;
        var paid = 0;
        $('.paid').each(function() {
            paid += parseFloat($(this).text());
        });
        document.getElementById("paid").innerHTML = paid;
        console.log(amount, discount, paid)
    </script>


</body>

</html>