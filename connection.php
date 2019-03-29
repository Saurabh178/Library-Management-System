<?php

$link = mysqli_connect("localhost", "root", "", "lib_mgmt_sys");
if(mysqli_connect_error()){
    die("Error: Unable to connect" . mysqli_connect_error());
}

?>