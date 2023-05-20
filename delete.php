<?php
include "./dp.php";
$id=$_GET["id"];
$deletQurey="DELETE FROM `note` WHERE `sno`=$id";
$result=mysqli_query($conn,$deletQurey);
header("Location:./index copy.php");


?>