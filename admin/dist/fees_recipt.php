<?php
include 'php/database.php';
if (isset($_POST['std_vise'])) {
    $class = $_POST['class'];
    $std_id = $_POST['std_id'];
    $fees = $_POST['fees'];
    $invoice_title = $_POST['invoice_title'];
    $months = $_POST['adv_month'];
    $amount = $_POST['amount'];
    $discount = $_POST['discount'];
    $gross = $_POST['gross'];

    $due_months = "";
    if ($months != "") {
        foreach ($months as $pmonths) {
            $due_months = $due_months . " " . $pmonths;
        }
    }

    $sql = "INSERT INTO fees (`std_roll`,`class`,`month`,`invoice_type`,`amount`,`discount`,`gross`) 
                        VALUES ('$std_id','$class','$due_months','$invoice_title','$amount','$discount','$gross')";
    $result = mysqli_query($connection, $sql);
}

if (isset($_POST['class_vise'])) {
    $class = $_POST['class'];
    $invoice_title = $_POST['invoice_title'];
    $months = $_POST['adv_month'];

    $due_months = "";
    if ($months != "") {
        foreach ($months as $pmonths) {
            $due_months = $due_months . " " . $pmonths;
        }
    }

    $sql_class = "SELECT * FROM students WHERE class='$class'";
    $result_class = mysqli_query($connection,$sql_class);
    while($row=mysqli_fetch_assoc($result_class)){
        $std_id = $row['id'];
        $fees = $row['tutionFee'];
        $annual_charges = $row['annualCharges'];
        $lab_charges = $row['lab_charges'];
        if($months!=""){
            $no_of_months = count($months);
            $amount = $no_of_months*$fees;
        }
        $sql = "INSERT INTO fees (`std_roll`,`class`,`month`,`invoice_type`,`amount`,`discount`,`gross`) VALUES ('$std_id','$class','$due_months','$invoice_title','$amount',0,'$amount')";
        $result = mysqli_query($connection, $sql);
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
    require 'includes/fee_recipt_side.php';
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
        function student_class(std_class) {
            $.ajax({
                url: "student_class.php",
                method: "POST",
                data: {
                    type: "students",
                    class: std_class
                },
                success: function(data) {
                    $('#students_list').html(data)
                }
            })
        }

        function tutionFees(value) {
            $.ajax({
                url: "student_class.php",
                method: "POST",
                data: {
                    type: "fees",
                    fees: value
                },
                success: function(data) {
                    $('#fees').val(data)
                    cal_advance()
                    discount_val()
                }
            })
        }

        function invoice_type1(value) {
            let title = $('#invoice_title').val()
            let show = document.getElementById("show")
            let std_id = document.getElementById("students_list").value
            console.log(std_id)

            if (title == "monthly" || title === "advance") {
                show.style.display = "block";
                $('#invoice_type').val(title)
            } else if (title === "lab") {
                $.ajax({
                    url: "student_class.php",
                    method: "POST",
                    data: {
                        type: "lab",
                        fees: std_id
                    },
                    success: function(data) {
                        $('#amount').val(data)
                        console.log(data)

                        // cal_advance()
                        discount_val()
                    }
                })
                show.style.display = "none";


            } else if (title === "annual") {
                $.ajax({
                    url: "student_class.php",
                    method: "POST",
                    data: {
                        type: "annual",
                        fees: std_id
                    },
                    success: function(data) {
                        $('#amount').val(data)
                        console.log(data)

                        // cal_advance()
                        discount_val()
                    }
                })
                show.style.display = "none";


            } else {
                show.style.display = "none";
                $('#invoice_type').val(title)

            }

        }
        function invoice_type1_a(value) {
            let title = $('#invoice_title_a').val()
            let show = document.getElementById("show_a")
            if (title == "monthly" || title === "advance") {
                show.style.display = "block";
               
               }else {
                show.style.display = "none";
                $('#invoice_type_a').val(title)

            }

        }

        function cal_advance() {
            let cal_adv = $("#months :selected").length + $(".advance_months:checked").length;
            let fees = $("#fees").val();
            let selectedfees = fees * cal_adv
            $("#amount").val(selectedfees)
            discount_val()
        }

        function discount_val() {
            let amount = $("#amount").val();
            let discount = $("#discount").val();
            $("#gross").val(amount - discount)

        }
    </script>



</body>

</html>