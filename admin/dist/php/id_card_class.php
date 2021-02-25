<?php

include 'database.php';

$class_id = $_GET['class'];

$name = "";
$gr_no = 0;
$class = "";
$dob = "";
$contact = "";
$address = "";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>
        Identity Card
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding-top: 50px;
    }

    .card {
        border: 2px solid black;
        max-width: 350px;
        padding: 15px;
        border-radius: 5px;
        margin: auto;
        text-align: center;
        /* margin-bottom: 5px; */
    }

    img {
        width: 50%;
        border: 5px solid #e1e1e1;
        border-radius: 50%;
        margin: auto;
    }

    .social {
        margin: 15px 0;
    }

    a {
        font-size: 26px;
        padding: 7px 12px;
        text-decoration: none;
        color: #585858;
        border: 1px solid #e1e1e1;
        border-radius: 10px;
    }

    a:hover {
        background-color: #585858;
        color: #ffffff;
    }

    table,
    table tr td {
        width: 290px;
        margin: 0 auto;
        border: 1px solid #e1e1e1;
        text-align: left;
    }

    .school_name h3,
    p {
        margin: 0px;
    }
    @media print{
        @page {
            size: landscape
            }
            }
</style>

<body>
    <div class="row">
        <?php
        $sql = "SELECT * FROM `students` where `students`.class='$class_id'";
        $result = mysqli_query($connection, $sql);
        function getAge($dob, $condate)
        {
            $birthdate = new DateTime(date("Y-m-d",  strtotime(implode('-', array_reverse(explode('/', $dob))))));
            $today = new DateTime(date("Y-m-d",  strtotime(implode('-', array_reverse(explode('/', $condate))))));
            $age = $birthdate->diff($today)->y;

            return $age;
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $gr_no = $row['gr_no'];
            $gender = $row['gender'];
            $dob = $row['dob'];
            $contact = $row['fnumber'];
            $mother_contact = $row['mnumber'];
            $address = $row['address'];


            $class = $row['class'];
            $std_class = "SELECT * FROM classes WHERE id='$class'";
            $std_class_result = mysqli_query($connection, $std_class);
            while ($row_class = mysqli_fetch_assoc($std_class_result)) {
                $class = $row_class['class_name'];
            }


            $curent_date = date('Y');
            // $age = date('Y', strtotime($curent_date))-date('Y',strtotime($dob));




            $age = getAge($dob, $curent_date);

        ?>
            <div class="col-md-4 col-lg-4 col-4 mb-2">
                <div class="card">


                    <div class="school_name">
                        <h3>Dar-Ul-Islah Academy</h3>
                        <small>Shop No. S-5&6 Ground Floor Kamran Chorangi</small>
                        <p>PHONE: <span>0317-2575687</span></p>
                    </div>
                    <img src="../images/avatar.jpg" alt="image" />
                    <h1><?php echo $name ?></h1>

                    <table>
                        <tr>
                            <td><strong>Gr No.</strong></td>
                            <td><?php echo $gr_no ?></td>
                        </tr>
                        <tr>
                            <td><strong>Gender</strong></td>
                            <td><?php echo $gender ?></td>
                        </tr>
                        <tr>
                            <td><strong>Class</strong></td>
                            <td><?php echo $class ?></td>
                        </tr>
                        <tr>
                            <td><strong>Age</strong></td>
                            <td><?php echo $age ?></td>
                        </tr>
                        <tr>
                            <td><strong>Contact</strong></td>
                            <td><?php echo $contact . '/' . $mother_contact ?></td>
                        </tr>
                        <tr>
                            <td><strong>Address</strong></td>
                            <td><?php echo $address ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>