<?php
include 'php/database.php';
$date = date('d-m-Y', strtotime('first day of this month'));
$current_date = date("d-m-Y");
$month_index = date("m");
$months = array("January", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december");
// echo $date;
// echo "<br>";
// echo $current_date;
// echo "<br>";

// echo $date;
// echo "<br>";
// echo $current_date;
// if ($date = $current_date) {

    // $std_id="";
    // $std_fees="";
    $x = false;

    $sql_1 = "SELECT * FROM `classes` inner join `students` on classes.class_name=students.class";
    $result_1 = mysqli_query($connection, $sql_1);
    while ($row_1 = mysqli_fetch_assoc($result_1)) {
        $std_id = $row_1['id'];
        $std_fees = $row_1['monthly_fees'];


        $current_month = $months[$month_index - 1];

        $sql = "SELECT * FROM `months` WHERE months='$current_month'";
        $result = mysqli_query($connection, $sql);
        // echo mysqli_num_rows($result);
        if (mysqli_num_rows($result) == 0) {
            $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`) VALUES ('$std_id', '$current_month', '$std_fees')";
            $result_fees = mysqli_query($connection, $sql_fees);
        }
        $x = true;
    }
    if ($x == true) {
        $sql = "INSERT INTO `months` (`months`) VALUES ('$current_month')";
        $result = mysqli_query($connection, $sql);
    }
//     echo "send";
// } 
// else {
//     echo "hello";
// }

?>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - School</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?php
    require 'includes/navbar.php';
    require 'includes/sidebar.php';
    require 'includes/dashboard_side_content.php';
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




</body>

</html>