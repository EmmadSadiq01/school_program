<?php
include 'database.php';

$std_name = "";
$months = [];
$std_class = "";
$amount = 0;
$std_id = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class = $_POST['class'];

    $sql = "SELECT * FROM `students` where `students`.class='$class' ORDER BY `students`.class ASC ";
    $result = mysqli_query($connection, $sql);
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $std_id[$i] = $row['id'];
        $i++;
    }

    foreach ($std_id as $i) {

        $sql = "SELECT * FROM `students` inner join `balance` on `students`.id = `balance`.std_id where `students`.id='$i'";
        $result = mysqli_query($connection, $sql);
        // echo $std_id;

        $x = 0;
        $count = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            if ($x == 0) {
                $std_name = $row['name'];
                $std_class = $row['class'];
                $x = 1;
            }
            $months[$count] = $row['months'];
            $amount += $row['amount'];
            $count++;
        }

        $sql_fees = "SELECT * FROM `classes` WHERE class_name = '$std_class' ";
        $result_fees = mysqli_query($connection, $sql_fees);
        while ($row = mysqli_fetch_assoc($result_fees)) {
            $fees = $row['monthly_fees'];
            break;
        }




    //     $sql = "SELECT * FROM `students` inner join `balance` on `students`.id = `balance`.std_id where `students`.class='$class'  ORDER BY `balance`.`std_id` ASC";
    //     $result = mysqli_query($connection, $sql);

    //     $x = 0;
    //     $i = 0;

    //     while ($row = mysqli_fetch_assoc($result)) {
    //         if ($x == 0) {
    //             $std_id = $row['id'];
    //             $std_name = $row['name'];
    //             $std_class = $row['class'];
    //             $x = 1;
    //         }
    //         if($row['id']==$row['std_id']){
    //         $months[$i] = $row['months'];
    //         $amount += $row['amount'];
    //         }
    //         $i++;
    //     }

    //     $sql = "SELECT * FROM `classes` WHERE class_name = '$std_class' ";
    //     $result = mysqli_query($connection, $sql);
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $fees = $row['monthly_fees'];
    //         break;
    //     }

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
    .std_copy {
        border: 1px solid;
        /* padding: 10px; */
    }

    .field {
        display: flex;
    }

    .field p {
        width: 144px;
    }

    .name {
        border-bottom: 1px solid;
        text-align: center;
    }

    .name_box {
        display: flex;
        border: 1px solid gray;
        border-radius: 10px;
    }

    .item {
        padding: 10px;
        width: 135px;
        background-color: gray;
        color: white;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .class {
        display: flex;

    }

    .class .value {
        margin-left: 9px
    }

    .key1 {
        padding: 8px;
        background-color: gray;
        color: white;
    }

    .key {
        padding: 8px;
        background-color: gray;
        color: white;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    p {
        margin-bottom: 0px;
    }

    .value {
        display: flex;
        align-items: center;
        padding-left: 5px;
        text-transform: capitalize;
    }

    .text {
        text-align: center;
    }

    .box {
        border: 1px solid gray;
        border-radius: 10px;
    }

    .copy h5 {
    font-size: 13px;
    font-family: initial;
    padding-top: 7px;
    }

    .amount {
        justify-content: space-between;
        display: flex;
    }

    .details {
        border: 1px solid gray;
        padding: 10px;
        border-radius: 5px;
    }

    hr {
        margin-top: 0rem;
        margin-bottom: 0rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    .content {
        padding: 5px 20px;
    }

    .foot-line {
        /* position: absolute; */
        border: -11px;
        position: relative;
        bottom: -8px;
        left: -15px;
        width: 109%;
        background-color: cadetblue;
        /* padding: 0px 10px; */
        border: -1px;
    }

    .foot-line h6 {
        color: white;
        font-size: 13px;
        font-weight: 300;
        font-family: times new roman;
    }
</style>

<body>
    <div class="container">
    <div class="vaucher">
            <div class="row">
                <div class="std_copy col-lg-4 col-12 col-md-4 col-sm-4 mt-2">
                    <div class="copy">

                        <h5>Student Copy</h5>
                    </div>
                    <div class="header mb-2">
                        <h4 class="text-center">School Management System</h4>
                        <div class="sch_name">
                            <!-- <div class="logo">
                            <img src="images/school.png" alt="">
                        </div> -->
                            <div class="text">
                                <small>This is my school</small>
                                <p>0341-2725048</p>
                            </div>

                        </div>

                        <div class="name_box">
                            <div class="item">
                                <p>Student name</p>
                            </div>
                            <p class="value"><?php echo $std_name ?></p>
                        </div>
                        <div class="box mt-2">
                            <div class="row">
                                <div class="col-6">
                                    <div class="class">
                                        <div class="key">
                                            <p>class</p>
                                        </div>
                                        <p class="value"><?php echo $std_class ?></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="class">
                                        <div class="key1">
                                            <p>Roll no.</p>
                                        </div>
                                        <p class="value">100<?php echo $i ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <h6>Fee Payable: </h6>
                    <div class="details">

                        <div class="amount">
                            <p>Tution fee</p>
                            <p>Rs <?php echo $fees ?></p>
                        </div>
                        <hr>
                        <div class="amount">
                            <p>Dues</p>
                            <p>Rs <?php echo $amount ?> </p>
                        </div>
                        <hr>
                        <div class="amount">
                            <p>Months</p>
                            <p> <?php foreach ($months as $m) {
                                    echo substr($m, 0, 3);
                                    echo " ";
                                } ?></p>
                        </div>
                        <hr>
                        <hr>
                        <div class="amount">
                            <h6>Total</h6>
                            <p>Rs <?php echo $amount ?> </p>
                        </div>
                    </div>

                    <div class="footer mt-3">
                        <div class="content">
                            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ullam impedit eius optio dicta fugit pariatur sequi fugiat! Facilis.</p>
                        </div>
                        <div class="foot-line">

                            <h6 class="text-center">Lorem ipsum dolor sit amet sit amet sit amet </h6>
                        </div>
                    </div>


                </div>
                <div class="std_copy col-lg-4 col-12 col-md-4 col-sm-4 mt-2">
                    <div class="copy">

                        <h5>Bank Copy</h5>
                    </div>
                    <div class="header mb-2">
                        <h4 class="text-center">School Management System</h4>
                        <div class="sch_name">
                            <!-- <div class="logo">
                            <img src="images/school.png" alt="">
                        </div> -->
                            <div class="text">
                                <small>This is my school</small>
                                <p>0341-2725048</p>
                            </div>

                        </div>

                        <div class="name_box">
                            <div class="item">
                                <p>Student name</p>
                            </div>
                            <p class="value"><?php echo $std_name ?></p>
                        </div>
                        <div class="box mt-2">
                            <div class="row">
                                <div class="col-6">
                                    <div class="class">
                                        <div class="key">
                                            <p>class</p>
                                        </div>
                                        <p class="value"><?php echo $std_class ?></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="class">
                                        <div class="key1">
                                            <p>Roll no.</p>
                                        </div>
                                        <p class="value">100<?php echo $i ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <h6>Fee Payable: </h6>
                    <div class="details">

                        <div class="amount">
                            <p>Tution fee</p>
                            <p>Rs <?php echo $fees ?></p>
                        </div>
                        <hr>
                        <div class="amount">
                            <p>Dues</p>
                            <p>Rs <?php echo $amount ?> </p>
                        </div>
                        <hr>
                        <div class="amount">
                            <p>Months</p>
                            <p> <?php foreach ($months as $m) {
                                    echo substr($m, 0, 3);
                                    echo " ";
                                } ?></p>
                        </div>
                        <hr>
                        <hr>
                        <div class="amount">
                            <h6>Total</h6>
                            <p>Rs <?php echo $amount ?> </p>
                        </div>
                    </div>

                    <div class="footer mt-3">
                        <div class="content">
                            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ullam impedit eius optio dicta fugit pariatur sequi fugiat! Facilis.</p>
                        </div>
                        <div class="foot-line">

                            <h6 class="text-center">Lorem ipsum dolor sit amet sit amet sit amet </h6>
                        </div>
                    </div>


                </div>
                <div class="std_copy col-lg-4 col-12 col-md-4 col-sm-4 mt-2">
                    <div class="copy">

                        <h5>School Copy</h5>
                    </div>
                    <div class="header mb-2">
                        <h4 class="text-center">School Management System</h4>
                        <div class="sch_name">
                            <!-- <div class="logo">
                            <img src="images/school.png" alt="">
                        </div> -->
                            <div class="text">
                                <small>This is my school</small>
                                <p>0341-2725048</p>
                            </div>

                        </div>

                        <div class="name_box">
                            <div class="item">
                                <p>Student name</p>
                            </div>
                            <p class="value"><?php echo $std_name ?></p>
                        </div>
                        <div class="box mt-2">
                            <div class="row">
                                <div class="col-6">
                                    <div class="class">
                                        <div class="key">
                                            <p>class</p>
                                        </div>
                                        <p class="value"><?php echo $std_class ?></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="class">
                                        <div class="key1">
                                            <p>Roll no.</p>
                                        </div>
                                        <p class="value">100<?php echo $i ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <h6>Fee Payable: </h6>
                    <div class="details">

                        <div class="amount">
                            <p>Tution fee</p>
                            <p>Rs <?php echo $fees ?></p>
                        </div>
                        <hr>
                        <div class="amount">
                            <p>Dues</p>
                            <p>Rs <?php echo $amount ?> </p>
                        </div>
                        <hr>
                        <div class="amount">
                            <p>Months</p>
                            <p> <?php foreach ($months as $m) {
                                    echo substr($m, 0, 3);
                                    echo " ";
                                } ?></p>
                        </div>
                        <hr>
                        <hr>
                        <div class="amount">
                            <h6>Total</h6>
                            <p>Rs <?php echo $amount ?> </p>
                        </div>
                    </div>

                    <div class="footer mt-3">
                        <div class="content">
                            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ullam impedit eius optio dicta fugit pariatur sequi fugiat! Facilis.</p>
                        </div>
                        <div class="foot-line">

                            <h6 class="text-center">Lorem ipsum dolor sit amet sit amet sit amet </h6>
                        </div>
                    </div>


                </div>



            </div>

            <!-- <div class="bank_copy">

            </div>
            <div class="school_copy">

            </div> -->
        </div>
  
  
    </div>

<?php
    }
}
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

</body>

</html>