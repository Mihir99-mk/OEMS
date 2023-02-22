<?php
session_start();
include_once("../../services/admin/Adminservice.php");
$cid = $_GET["cid"];
$Admin = new AdminService();
$adminId = $_SESSION["adminId"];
$mgdata = $Admin->viewmanagesubject($cid, $adminId);
?>
<table id="myTable" class="table table-bordered table-hover">

<thead >
    <tr>
        <th scope="col">No</th>
        <th scope="col">Subject Name</th>
        <th scope="col">Subject Description</th>
    </tr>
</thead>
<tbody id="dh">

<?php
foreach ($mgdata as $k => $data) {
    $subId = $data["subId"];
    $msdata = $Admin->viewsubjectsfromcourse($subId, $adminId);
    foreach ($msdata as $vdata) {

?>

        <tr>
            <td><?php echo $k+ 1; ?></td>
            <td><?php echo $vdata["subName"]; ?></td>
            <td><?php echo $vdata["subDesc"]; ?></td>
            <!-- <td><a href="subject-update.php?uid=<?php echo $val["subId"]; ?>"  class="btn btn-primary">Update</a></td>
                                                    <td><a href="subject-delete.php?did=<?php echo $val["subId"]; ?>"  class="btn btn-danger">Delete</a></td>-->
        </tr>




<?php
    }
}
?>

</tbody>
</table>