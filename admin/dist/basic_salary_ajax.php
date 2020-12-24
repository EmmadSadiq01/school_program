<?php
include 'php/database.php';

$id = $_POST['staff'];
$sql = "SELECT * From teacher WHERE `id` = '$id'";
$result = mysqli_query($connection, $sql);

$str = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $str = $row['salary'];
}
echo $str;
