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


    function QuizData($quizId,$offset,$itemperpage)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `questions` WHERE quizId=? LIMIT ?, ?");
        $query->bind_param('iii', $quizId,$offset,$itemperpage);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }

    function Quiz($quizId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `questions` WHERE quizId=?");
        $query->bind_param('i', $quizId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }



    function QuizDataCheck($quizId,$quesno)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `questions` WHERE quizId=?  AND quesno=?");
        $query->bind_param('ii', $quizId,$quesno);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }

    function QuizDataCount($quizId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `questions` WHERE quizId=?");
        $query->bind_param('i', $quizId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);
       
        return $result->num_rows;
    }
   
    function QuizResult($studId,$quizId,$cans,$wans,$totalques,$totalmark)
    {
        $con = Database::connection();
        $query = $con->prepare("INSERT INTO `result`(`studId`, `quizId`, `cansw`, `wansw`, `totalques`, `totalmark`) VALUES (?,?,?,?,?,?)");
        $query->bind_param('iiiiii', $studId, $quizId, $cans,$wans,$totalques,$totalmark);
        if ($query->execute()) {
            return 0;
        }else{
            return 1;
        }
    }

    function QuizComplete($quizId,$studId,$complete)
    {
        $con = Database::connection();
        $query = $con->prepare("INSERT INTO `completequiz`(`quizId`, `studId`, `complete`) VALUES (?,?,?)");
        $query->bind_param('iii',  $quizId,$studId,$complete);
        if ($query->execute()) {
            return 0;
        }else{
            return 1;
        }
    }

    function quizHistory($studId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `result` WHERE studId = ?");
        $query->bind_param('i', $studId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);
       
        return $json;
    }

    function quizNameHistory($quizId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `configquiz` WHERE quizId=?");
        $query->bind_param('i', $quizId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);
       
        return $json;
    }

    function QuizCompleteCheck($quizId,$studId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `completequiz` WHERE quizId = ? AND studId=?");
        $query->bind_param('ii', $quizId,$studId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);

        return $json;
    }




    
    

    function configquiz($quizId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `configquiz` WHERE quizId=?");
        $query->bind_param('i', $quizId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);
       
        return $json;
    }

    function configquizCheck($quizId,$studId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `completequiz` WHERE quizId =? AND studId=?");
        $query->bind_param('ii', $quizId,$studId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);
       
        return $json;
    }

    function quizcheck($studId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `result` 
        JOIN configquiz on configquiz.quizId = result.quizId
        JOIN student on student.studId = result.studId
        WHERE student.studId = ?");
        $query->bind_param('i', $studId);
        $query->execute();
        $result = $query->get_result();
        $json = $result->fetch_all(MYSQLI_ASSOC);
       
        return $json;
    }

}


?>
