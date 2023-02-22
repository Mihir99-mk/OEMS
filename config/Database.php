<?php
class Database
{


    public static function connection()
    {
        $hname = "localhost";
        $root = "root";
        $password = "";
        $dbname = "oems2";
        $conn = new mysqli($hname, $root, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            return $conn;
        }
    }
}
