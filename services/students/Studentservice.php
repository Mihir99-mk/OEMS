<?php
include_once("../../config/Database.php");
interface StudentInterface
{
    function login($email, $password);
    
}

class StudentService implements StudentInterface
{

    function login($email, $password)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `student` WHERE email=? AND password=?");
        $query->bind_param('ss', $email, $password);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($json);
    }

    function Coursename($studId,$cId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `course` INNER JOIN student ON course.cId = student.cId WHERE student.studId = ? AND student.cId = ?");
        $query->bind_param('ii', $studId, $cId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }

    function CourseDetails($studId,$cId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT managecourse.subId FROM `managecourse` JOIN student ON student.cId = managecourse.cId  WHERE student.studId=? AND student.cId=?");
        $query->bind_param('ii', $studId, $cId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }

    function ShowQuiz($studId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT q.quizId,q.qname,q.qdesc,q.date,q.startTime,q.endTime,q.noofques,q.eachMark,q.publish,q.subId FROM `student` as s JOIN managecourse as c ON s.cId = c.cId JOIN configquiz as q ON c.subId = q.subId WHERE s.studId =?");
        $query->bind_param('i', $studId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }

   

}


?>
