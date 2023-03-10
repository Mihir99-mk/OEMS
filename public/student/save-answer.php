<?php 
session_start();

$quesno = $_GET["quesno"];
$rvalue = $_GET["rvalue"];

$_SESSION["answer"][$quesno] = $rvalue;




echo $quesno." ".$rvalue;
?>