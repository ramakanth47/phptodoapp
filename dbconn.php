<?php

$conn = mysqli_connect("localhost", "root", "", "todo");

if(mysqli_connect_error()) {
    echo "Connection Failed" . mysqli_connect_error();
}  else {
    echo "Connection Successful!";
}
?>