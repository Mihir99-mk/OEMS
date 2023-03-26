<?php
session_start();
include_once("../../services/admin/Adminservice.php");
$reportname = $_GET["report"];

if ($reportname == "course") {

    $Admin = new AdminService();
    $adminId = $_SESSION["adminId"];
    $data = $Admin->viewCourse($adminId);
    $jdata = $data;

?>

<select class="form-select mt-3" id="subject" name="subject" aria-label="Default select example" onchange="sub()">
    <option selected>Select options</option>

    <?php
    foreach ($jdata as $val) {
        $cid = $val["cId"];


    ?>
        <option value="<?php echo $val["cId"]; ?>"><?php echo $val["courseName"]; ?></option>
    <?php

    }

    ?>
</select>

<?php
}else{

}
?>