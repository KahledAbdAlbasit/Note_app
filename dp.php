<?php

$serve="localhost";
$username="root";
$password="";
$database="notes";

$conn=mysqli_connect($serve,$username,$password,$database);
if(!$conn)
{
    echo "No";
}

?>