<!-- <?php 

    $con = new mysqli('localhost', 'root', '', 'college');

?> -->

<?php

$con = new mysqli("localhost", "root", "", "college");

if ($con->connect_errno) {
    echo "connection failed to mysql " . $con->connect_errno;
    die();
} 

?>