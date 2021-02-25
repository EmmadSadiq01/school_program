<?php
include 'php/database.php';
include 'php/logedin.php';
// session_start();



if (isset($_POST['std_vise'])) {
    $class = $_POST['class'];
    $std_id = $_POST['std_id'];
    $fees = $_POST['fees'];
    // $invoice_title = $_POST['invoice_title'];
    $months = $_POST['adv_month'];
    $amount = $_POST['amount'];
    $discount = $_POST['discount'];
    $gross = $_POST['gross'];
    $sports_fee = $_POST['sports_fee'];
    $annualCharges = $_POST['annualCharges'];
    $labCharges = $_POST['labCharges'];
    $reg_fees = $_POST['reg_fees'];
    $add_fees = $_POST['add_fees'];

    $due_months = "";
    if ($months != "") {
        foreach ($months as $pmonths) {
            // $due_months = $due_months . " " . $pmonths;
            $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id', '$pmonths', '$fees','monthly')";
            $result_fees = mysqli_query($connection, $sql_fees);
        }
    }
    if ($sports_fee != 0) {
        $sql_sports_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id','Sports Fees', '$sports_fee','sportsCharg')";
        $result_sports_fees = mysqli_query($connection, $sql_sports_fees);
    }
    if ($annualCharges != 0) {
        $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id','Annual Charges', '$annualCharges','annual charges')";
        $result_fees = mysqli_query($connection, $sql_fees);
    }
    if ($labCharges != 0) {
        $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id', 'Lab Charges', '$labCharges','Lab fees')";
        $result_fees = mysqli_query($connection, $sql_fees);
    }
    if ($reg_fees != 0) {
        $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id', 'Registration Fees', '$reg_fees','reg_Charges')";
        $result_fees = mysqli_query($connection, $sql_fees);
    }
    if ($add_fees != 0) {
        $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id', 'Admission Fees', '$add_fees','add_fees')";
        $result_fees = mysqli_query($connection, $sql_fees);
    }

    // $sql = "INSERT INTO fees (`std_roll`,`class`,`month`,`invoice_type`,`amount`,`discount`,`gross`) 
    //         VALUES ('$std_id','$class','$due_months','$invoice_title','$amount','$discount','$gross')";
    // $result = mysqli_query($connection, $sql);

    $_SESSION['std_vise'] = $std_id;
    header('Location: http://localhost/schoolManagementSystem/admin/dist/php/vaucher.php?id=' . $std_id);
}

if (isset($_POST['class_vise'])) {
    $class = $_POST['class'];
    // $invoice_title = $_POST['invoice_title'];
    $months = $_POST['adv_month'];
    $sports_feeInput = $_POST['sports_fee'];
    $annualChargesInput = $_POST['annualCharges'];
    $labChargesInput = $_POST['labCharges'];
    $reg_feesInput = $_POST['reg_fees'];

    $due_months = "";
    if ($months != "") {
        foreach ($months as $pmonths) {
            $due_months = $due_months . " " . $pmonths;
        }
    }

    $sql_class = "SELECT * FROM students WHERE class='$class'";
    $result_class = mysqli_query($connection, $sql_class);
    while ($row = mysqli_fetch_assoc($result_class)) {
        $std_id = $row['id'];
        $fees = $row['tutionFee'];
        $annual_charges = $row['annualCharg'];
        $lab_charges = $row['lab_charges'];
        $sports_fee = $row['sportsCharg'];
        $reg_fees = $row['reg_Charges'];

        if ($months != "") {
            foreach ($months as $pmonths) {
                $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id', '$pmonths', '$fees','monthly')";
                $result_fees = mysqli_query($connection, $sql_fees);
            }
            $no_of_months = count($months);
            $amount = $no_of_months * $fees;
        } 

        if ($sports_feeInput == "set") {
            $sql_sports_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id','Sports Fees', '$sports_fee','sportsCharg')";
            $result_sports_fees = mysqli_query($connection, $sql_sports_fees);
        }
        if ($annualChargesInput == "set") {
            $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id','Annual Charges', '$annual_charges','annual charges')";
            $result_fees = mysqli_query($connection, $sql_fees);
        }
        if ($labChargesInput == "set") {
            $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id', 'Lab Charges', '$lab_charges','Lab fees')";
            $result_fees = mysqli_query($connection, $sql_fees);
        }
        if ($reg_feesInput == "set") {
            $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id', 'Registration Fees', '$reg_fees','reg_Charges')";
            $result_fees = mysqli_query($connection, $sql_fees);
        }
        
        // elseif ($invoice_title == "lab") {
        //     $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id', '', '$lab_charges','$invoice_title')";
        //     $result_fees = mysqli_query($connection, $sql_fees);
        // } elseif ($invoice_title == "annual") {
        //     $sql_fees = "INSERT INTO `balance` (`std_id`, `months`, `amount`,`invoice_type`) VALUES ('$std_id', '', '$annual_charges','$invoice_title')";
        //     $result_fees = mysqli_query($connection, $sql_fees);
        // }
        // $sql = "INSERT INTO fees (`std_roll`,`class`,`month`,`invoice_type`,`amount`,`discount`,`gross`) VALUES ('$std_id','$class','$due_months','$invoice_title','$amount',0,'$amount')";
        // $result = mysqli_query($connection, $sql);
    }
    $_SESSION['class_vise'] = $class;
    header('Location: http://localhost/schoolManagementSystem/admin/dist/php/classvise.php?class=' . $class);
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
        let student_id = "";

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
            student_id = value
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

        // function invoice_type1(value) {
        //     let title = $('#invoice_title').val()
        //     let show = document.getElementById("show")
        //     let std_id = document.getElementById("students_list").value
        //     console.log(std_id)

        //     if (title == "monthly" || title === "advance") {
        //         show.style.display = "block";
        //         $('#invoice_type').val(title)
        //     } else if (title === "lab") {
        //         $.ajax({
        //             url: "student_class.php",
        //             method: "POST",
        //             data: {
        //                 type: "lab",
        //                 fees: std_id
        //             },
        //             success: function(data) {
        //                 $('#amount').val(data)
        //                 console.log(data)

        //                 // cal_advance()
        //                 discount_val()
        //             }
        //         })
        //         show.style.display = "none";


        //     } else if (title === "annual") {
        //         $.ajax({
        //             url: "student_class.php",
        //             method: "POST",
        //             data: {
        //                 type: "annual",
        //                 fees: std_id
        //             },
        //             success: function(data) {
        //                 $('#amount').val(data)
        //                 console.log(data)

        //                 // cal_advance()
        //                 discount_val()
        //             }
        //         })
        //         show.style.display = "none";


        //     } else {
        //         show.style.display = "none";
        //         $('#invoice_type').val(title)

        //     }

        // }

        function invoice_type1_a(value) {
            let title = $('#invoice_title_a').val()
            let show = document.getElementById("show_a")
            if (title == "monthly" || title === "advance") {
                show.style.display = "block";

            } else {
                show.style.display = "none";
                $('#invoice_type_a').val(title)

            }

        }

        function sports_fee1() {
            if ($('#sports_fee').is(":checked")) {
                $.ajax({
                    url: "student_class.php",
                    method: "POST",
                    data: {
                        type: "sports_fee",
                        std_id: student_id
                    },
                    success: function(data) {
                        $('#sports_fee').val(data)
                        console.log(data)
                        cal_advance()
                    }
                })
            } else {
                $('#sports_fee').val(0)
                cal_advance()
            }

        }

        function annualCharges1() {
            if ($('#annualCharges').is(":checked")) {
                $.ajax({
                    url: "student_class.php",
                    method: "POST",
                    data: {
                        type: "annualCharges",
                        std_id: student_id
                    },
                    success: function(data) {
                        $('#annualCharges').val(data)
                        console.log(data)
                        cal_advance()
                    }
                })
            } else {
                $('#annualCharges').val(0)
                cal_advance()
            }
        }

        function reg_fees1() {
            if ($('#reg_fees').is(":checked")) {
                $.ajax({
                    url: "student_class.php",
                    method: "POST",
                    data: {
                        type: "reg_fees",
                        std_id: student_id
                    },
                    success: function(data) {
                        $('#reg_fees').val(data)
                        console.log(data)
                        cal_advance()
                    }
                })
            } else {
                $('#reg_fees').val(0)
                cal_advance()
            }
        }
        function add_fees1() {
            if ($('#add_fees').is(":checked")) {
                $.ajax({
                    url: "student_class.php",
                    method: "POST",
                    data: {
                        type: "add_fees",
                        std_id: student_id
                    },
                    success: function(data) {
                        $('#add_fees').val(data)
                        console.log(data)
                        cal_advance()
                    }
                })
            } else {
                $('#add_fees').val(0)
                cal_advance()
            }
        }

        function labCharges1() {
            if ($('#labCharges').is(":checked")) {
                $.ajax({
                    url: "student_class.php",
                    method: "POST",
                    data: {
                        type: "labCharges",
                        std_id: student_id
                    },
                    success: function(data) {
                        $('#labCharges').val(data)
                        console.log(data)
                        cal_advance()
                    }
                })
            } else {
                $('#labCharges').val(0)
                cal_advance()
            }
        }

        function cal_advance() {
            let cal_adv = $(".advance_months:checked").length;
            console.log(cal_adv)
            let fees = $("#fees").val();
            let selectedfees = fees * cal_adv
            let sports_fee = parseInt($('#sports_fee').val());
            let annualCharges = parseInt($('#annualCharges').val());
            let labCharges = parseInt($('#labCharges').val());
            let reg_fees = parseInt($('#reg_fees').val());
            let add_fees = parseInt($('#add_fees').val());
            let total = selectedfees + sports_fee + annualCharges + labCharges + reg_fees + add_fees ;
            console.log(total)
            $("#amount").val(total)
            discount_val()
        }

        function selected(id){
            if ($('#'+id).is(":checked")) {
                $('#'+id).val("set")
            }
            else{
                $('$'+id).val(0)
            }
        }

        function discount_val() {
            let amount = $("#amount").val();
            let discount = $("#discount").val();
            $("#gross").val(amount - discount)

        }
    </script>



</body>

</html>