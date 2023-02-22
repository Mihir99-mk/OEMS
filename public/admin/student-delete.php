<?php
session_start();
include_once("../../services/admin/Adminservice.php");
if ($_SESSION['IS_LOGIN'] != true) {
    header("Location: ./login.php");
}
$cId = $_GET["sid"];

$Admin = new AdminService();
$adminId = $_SESSION["adminId"];
$data = $Admin->deletestudent($adminId,$cId);
if($data == 0){
    header("Location: view-student.php");
}

?>