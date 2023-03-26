<?php
session_start();
include_once("../../services/admin/Adminservice.php");
$cid = $_POST["cid"];
// echo $cid;
// if (isset($cid)) {


$Admin = new AdminService();
$adminId = $_SESSION["adminId"];
$checkId = $Admin->checkcId($adminId,$cid);

if ($checkId == 0) {
    
$admin = $Admin->Chart($cid, $adminId);
$cdata = array();

foreach ($admin as $v) {
    $object = new stdClass();
    
    $count = new stdClass();
    // $c = count();
    $count->studentcount = $v["studId"];
    $object->subject = $v["subName"];
    $object->student = $v["studId"];
    $v = array($object->student);
    $object->count = count($v);
 
    $cdata[] = $object;
}
header('Content-Type: application/json');

echo json_encode($cdata);
}

if ($checkId == 1) {
    echo json_encode(0);
  
}

?>