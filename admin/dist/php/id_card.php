<?php

include 'database.php';

$std_id = $_GET['id'];

$name = "";
$gr_no = 0;
$class = "";
$dob = "";
$contact = "";
$address = "";


$sql = "SELECT * FROM `students` where `students`.id='$std_id'";
$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $gr_no = $row['gr_no'];
    $gender = $row['gender'];
    $dob = $row['dob'];
    $contact = $row['fnumber'];
    $mother_contact = $row['mnumber'];
    $address = $row['address'];
    $image = $row['img_dir'];


    $class = $row['class'];
    $std_class = "SELECT * FROM classes WHERE id='$class'";
    $std_class_result = mysqli_query($connection, $std_class);
    while ($row_class = mysqli_fetch_assoc($std_class_result)) {
        $class = $row_class['class_name'];
    }
}

$curent_date = date('Y');
// $age = date('Y', strtotime($curent_date))-date('Y',strtotime($dob));


function getAge($dob, $condate)
{
    $birthdate = new DateTime(date("Y-m-d",  strtotime(implode('-', array_reverse(explode('/', $dob))))));
    $today = new DateTime(date("Y-m-d",  strtotime(implode('-', array_reverse(explode('/', $condate))))));
    $age = $birthdate->diff($today)->y;

    return $age;
}

$age = getAge($dob, $curent_date);




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
        margin-bottom: 5px;
    }

    img {
        width: 50%;
        border: 5px solid #e1e1e1;
        border-radius: 50%;
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
</style>

<body>
    <div class="row">
        <div class="card col-md-6 col-lg-6 col-6">
            <div class="school_name">
                <h3>Dar-Ul-Islah Academy</h3>
                <small>Shop No. S-5&6 Ground Floor Kamran Chorangi</small>
                <p>PHONE: <span>0317-2575687</span></p>
            </div>
            <img src="../images/avatar.jpg" alt="image" />
            <?php
            if ($image == '') {
                    if ($gender == 'Male') {
                        echo '<img src="../images/avatar.jpg" alt="" class="img-thumbnail">';
                    }
                    if ($gender == 'Female') {
                        echo '<img src="../images/girl avatar.jpg" alt="" class="img-thumbnail">';
                    }
                } else {
                    echo '<img src="../images/' . $row['img_dir'] . ' " alt="" class="img-thumbnail">';
                }
            ?>
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

</body>

</html>