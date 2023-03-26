<?php
include_once("../../config/Database.php");
interface AdminInterface
{
    function login($username, $password);
    function faculty($adminId, $fname, $lname, $address, $phoneno, $email, $password, $gender, $qualification, $img, $dob);
    function subject($adminId, $subName, $subDes);
    function assignSubject($facId, $subId);
    function viewFaculty($adminId);
    function viewSubject($adminId);
    function viewCourse($adminId);
    function manageCourse($adminId, $cId, $subId);
    function manageFaculty($adminId, $facId, $subId);
    function viewStudentProfile($adminId, $stuId);
    public function courseAnalytics($cId, $adminId);
    public function viewAdmin($adminId);
    public function viewmanagesubject($cid, $adminId);
    public function viewsubjectsfromcourse($subid, $adminId);
}

class AdminService implements AdminInterface
{

    public function login($username, $password)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM admin WHERE username=? AND password=?");
        $query->bind_param('ss', $username, $password);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_assoc();

        return json_encode($json);
    }

    public function faculty($adminId, $fname, $lname, $address, $phoneno, $email, $password, $gender, $qualification, $img, $dob)
    {
        $con = Database::connection();
        $query = $con->prepare("INSERT INTO `faculty`( `adminId`, `fname`, `lname`, `address`, `phoneno`, `email`, `password`, `Gender`, `qualification`, `profileImg`, `dob`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $query->bind_param('issssssssss', $adminId, $fname, $lname, $address, $phoneno, $email, $password, $gender, $qualification, $img, $dob);
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function student($adminId, $fname, $lname, $address, $phoneno, $email, $cId, $password, $gender,  $img, $dob)
    {
        $con = Database::connection();
        $query = $con->prepare("INSERT INTO `student`(`adminId`, `fname`, `lname`, `address`, `phoneno`, `email`, `cId`, `password`, `Gender`, `profileImg`, `dob`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $query->bind_param('isssssissss', $adminId, $fname, $lname, $address, $phoneno, $email, $cId, $password, $gender, $img, $dob);
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function course($adminId, $couName)
    {
        $con = Database::connection();
        $query = $con->prepare("INSERT INTO `course`(`adminId`, `courseName`) VALUES (?,?)");
        $query->bind_param('is', $adminId, $couName);
        // $query->execute();
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function subject($adminId, $subName, $subDes)
    {
        $con = Database::connection();
        $query = $con->prepare("INSERT INTO `subject`(`adminId`, `subName`, `subDesc`) VALUES (?,?,?)");
        $query->bind_param('iss', $adminId, $subName, $subDes);
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function updateAdmin($adminId, $username, $password)
    {
        $con = Database::connection();
        $query = $con->prepare("UPDATE `admin` SET `username`=?,`password`=?  WHERE adminId=?");
        $query->bind_param('ssi', $username, $password, $adminId);
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function manageCourse($adminId, $cId, $subId)
    {
        $con = Database::connection();

        //
        $query2 = $con->prepare("SELECT * FROM `managecourse` WHERE cId = ? AND subId=? AND adminId = ?");
        $query2->bind_param('iii', $cId, $subId, $adminId);
        $query2->execute();
        $result2 = $query2->get_result();
        $data = $result2->fetch_all(MYSQLI_ASSOC);
        if (count($data) != 0) {
            return 2;
        } else {
            $query = $con->prepare("INSERT INTO `managecourse`(`cId`, `subId`, `adminId`) VALUES (?,?,?)");
            $query->bind_param('iss', $cId, $subId, $adminId);

            if ($query->execute()) {
                return 0;
            }
            // if (!$query->execute()){
            //     return 1;
            // }
        }
    }

    public function manageFaculty($adminId, $facId, $subId)
    {
        $con = Database::connection();
        $query = $con->prepare("INSERT INTO `managefaculty`(`facId`, `subId`, `adminId`) VALUES (?,?,?)");
        $query->bind_param('iss', $facId, $subId, $adminId);

        //
        $query2 = $con->prepare("SELECT * FROM `managefaculty` WHERE facId = ? AND subId=? AND adminId = ?");
        $query2->bind_param('iii', $facId, $subId, $adminId);
        $query2->execute();
        $result2 = $query2->get_result();
        $data = $result2->fetch_all(MYSQLI_ASSOC);
        if (count($data) != 0) {
            return 2;
        } else {
            if ($query->execute()) {
                return 0;
            }
            // if (!$query->execute()){
            //     return 1;
            // }
        }
    }


    public function assignSubject($facId, $subId)
    {
        $con = Database::connection();
        $query = $con->prepare("INSERT INTO `assignsubject`(`facId`, `subId`) VALUES (?,?)");
        $query->bind_param('ii', $facId, $subId);
        $query->execute();
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }


    public function Chart($cId, $adminId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM managecourse
        JOIN student ON managecourse.cId = student.cId
        JOIN subject ON managecourse.subId = subject.subId
        WHERE managecourse.cId = ? AND managecourse.adminId = ?");
        $query->bind_param('ii', $cId, $adminId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);
        return $json;
    }

    public function viewFaculty($adminId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `faculty` WHERE adminId=?");
        $query->bind_param('i', $adminId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($json);
    }

    public function checkcId($adminId, $cId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `managecourse` WHERE cId=? and adminId=?");
        $query->bind_param('ii', $cId, $adminId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);
        if (!empty($json)) {
            return 0;
        }else{
            return 1;
        }

    }


    public function viewFacultyProfile($adminId, $facId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `faculty` WHERE adminId=? AND facId=?");
        $query->bind_param('ii', $adminId, $facId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($json);
    }



    public function viewStudentProfile($adminId, $stuId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `student` WHERE adminId=? AND studId=?");
        $query->bind_param('ii', $adminId, $stuId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($json);
    }

    public function viewAdmin($adminId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `admin` WHERE adminId=?");
        $query->bind_param('i', $adminId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($json);
    }

    public function viewSubject($adminId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `subject` WHERE adminId=?");
        $query->bind_param('i', $adminId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($json);
    }

    public function viewStudentName($adminId, $subId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `subject` WHERE adminId=? AND subId=?");
        $query->bind_param('ii', $adminId, $subId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }

    public function viewCourse($adminId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `course` WHERE adminId=?");
        $query->bind_param('i', $adminId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }

    public function viewCourseName($cId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `course` WHERE cId=?");
        $query->bind_param('i', $cId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }

    public function viewStudentCourse($cId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `student` WHERE cId=?");
        $query->bind_param('i', $cId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }

    public function viewStudent($adminId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `student` WHERE adminId=?");
        $query->bind_param('i', $adminId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($json);
    }

    public function deleteCourse($adminId, $cid)
    {
        $con = Database::connection();
        $query = $con->prepare("DELETE FROM `course` WHERE adminId=? AND cId=?");
        $query->bind_param('ii', $adminId, $cid);
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }
    public function deleteSubject($adminId, $subId)
    {
        $con = Database::connection();
        $query = $con->prepare("DELETE FROM `subject` WHERE adminId=? AND subId=?");
        $query->bind_param('ii', $adminId, $subId);
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function deleteFaculty($adminId, $facId)
    {
        $con = Database::connection();
        $query = $con->prepare("DELETE FROM `faculty` WHERE adminId=? AND facId=?");
        $query->bind_param('ii', $adminId, $facId);
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function deleteStudent($adminId, $studId)
    {
        $con = Database::connection();
        $query = $con->prepare("DELETE FROM `student` WHERE adminId=? AND studId=?");
        $query->bind_param('ii', $adminId, $studId);
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }


    public function courseAnalytics($cId, $adminId)
    {

        $con = Database::connection();

        $query1 = $con->prepare("SELECT * FROM `managecourse` WHERE cId=? AND adminId=?");
        $query1->bind_param('ii', $cId, $adminId);

        $query1->execute();
        $result1 = $query1->get_result();
        $data1 = $result1->fetch_all(MYSQLI_ASSOC);
        return $data1;
    }

    public function coursesubjectAnalytics($sId)
    {

        $con = Database::connection();

        $query1 = $con->prepare("SELECT * FROM `subject` WHERE subId= ?");
        $query1->bind_param('i', $sId);

        $query1->execute();
        $result1 = $query1->get_result();
        $data1 = $result1->fetch_all(MYSQLI_ASSOC);
        return $data1;
    }

    public function viewmanagesubject($cid, $adminId)
    {

        $con = Database::connection();

        $query1 = $con->prepare("SELECT DISTINCT managecourse.cId, managecourse.subId FROM managecourse INNER JOIN course on managecourse.cId = course.cId WHERE course.cId = ? AND managecourse.adminId = ?");
        $query1->bind_param('ii', $cid, $adminId);

        $query1->execute();
        $result1 = $query1->get_result();
        $data1 = $result1->fetch_all(MYSQLI_ASSOC);
        return $data1;
    }

    public function viewsubjectsfromcourse($subid, $adminId)
    {

        $con = Database::connection();

        $query1 = $con->prepare("SELECT * FROM `subject` WHERE subId = ? AND adminId=?");
        $query1->bind_param('ii', $subid, $adminId);

        $query1->execute();
        $result1 = $query1->get_result();
        $data1 = $result1->fetch_all(MYSQLI_ASSOC);
        return $data1;
    }
};
// $ad = new AdminService();
// $d = $ad->courseAnalytics(10,1);
// foreach($d as $a){
//     // print_r($a["cId"]);
//     $s = $ad->coursesubjectAnalytics($a["subId"]);
//     // print_r($s[0]);
//     $ss = $s[0];
//     foreach($s as $v){
//         print_r($v["subName"]);
//     }

// }
