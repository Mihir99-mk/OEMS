<?php
session_start();
include_once("../../services/admin/Adminservice.php");
$subId = $_GET["sub"];

echo $subId;

$admin = new AdminService();
$s = $admin->coursesubjectAnalytics($subId);
print_r($s);
// if (!empty($s)) {
foreach ($s as $v) {
    print_r($v["subName"]);
    // $subName = $v["subName"];
    // echo $subName;
}
?>

 



