<?php
include_once("../../config/Database.php");
interface facultyInterface
{
    function login($email, $password);
    // function student($facId, $name, $email, $password);
    function getSubject($facId);
}

class FacultyService implements facultyInterface
{

    function login($email, $password)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM faculty WHERE email=? AND password=?");
        $query->bind_param('ss', $email, $password);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($json);
    }


    public function viewEnrollSubject($facId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `faculty` WHERE adminId=?");
        $query->bind_param('i', $adminId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($json);
    }

    function getSubject($facId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `managefaculty` WHERE facId=? ");
        $query->bind_param('i', $facId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }


    function getSubjectName($subId)
    {
        $con = Database::connection();
        $squery = $con->prepare("SELECT * FROM `subject` WHERE subId=?");

        $squery->bind_param('i', $subId);
        $squery->execute();
        $sresult = $squery->get_result();
        $sjson = $sresult->fetch_all(MYSQLI_ASSOC);

        return $sjson;
    }

    // public function student($facId, $name, $email, $password)
    // {
    //     $db = new Database();
    // $con = $db->connection();
    //     $query = $con->prepare("INSERT INTO `student`(`facId`, `studName`, `email`, `password`) VALUES (?,?,?,?)");
    //     $query->bind_param('isss', $facId,$name, $email, $password);
    //     $query->execute();
    //     if ($query->execute()) {
    //         return 0;
    //     }else{
    //         return 1;
    //     }
    // }
}
$admin = new FacultyService();
$datas = $admin->getSubject(16);
foreach ($datas as $v) {
$dt = $admin->getSubjectName($v["subId"]);

    print_r($dt[0]["subName"]);
}


?>