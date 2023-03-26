<?php
header('Content-Type: application/json');
session_start();
include_once("../../services/admin/Adminservice.php");
$cid = $_GET["cid"];

// if (isset($cid)) {


$Admin = new AdminService();
$adminId = $_SESSION["adminId"];
$admin = $Admin->viewmanagesubject($cid, $adminId);

foreach ($admin as $v) {
    $cname = $Admin->viewStudentCourse($v["cId"]);
    // foreach ($cname as $vc) {
    $studentcount[] = count($cname);
    // }
    $sname = $Admin->viewStudentName($adminId, $v["subId"]);
}
foreach ($sname as $vs) {
    $subidData[] = $vs["subName"];
}
$chart_data = array(
    "chart" => array(
        "type" => "bar"
    ),
    "series" => array(
        array(
            "name" => "Students",
            "data" => $studentcount
        )
    ),
    "xaxis" => array(
        "categories" => $subidData
    )
);
$data = json_encode($chart_data);

print_r($data);
// }
// echo '<script>';
// echo 'var chart_data = ' . json_encode($chart_data) . ';';
// echo '</script>';


var options = {
    chart: {
        type: 'bar'
    },
    series: [{
        name: 'Students',
        data: data["student"]
    }],
    xaxis: {
        categories: data["subject"]
    }
};
var chart = new ApexCharts(document.querySelector('#chart'), options);
chart.render();
// var chart = new ApexCharts(document.querySelector("#chart"), response);
// chart.render();
// setTimeout(()=>{

// },10000)
