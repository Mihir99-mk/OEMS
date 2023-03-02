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

    public function configQuiz($facId,$qname, $qdesc, $subId,$data,$stime,$etime,$noofques,$eachmark)
    {
        $con = Database::connection();
        $query = $con->prepare("INSERT INTO `configquiz`(`facId`, `qname`, `qdesc`, `subId`, `date`, `startTime`, `endTime`, `noofques`, `eachMark`) VALUES (?,?,?,?,?,?,?,?,?)");
        $query->bind_param('ississsii', $facId,$qname, $qdesc, $subId,$data,$stime,$etime,$noofques,$eachmark);
        if ($query->execute()) {
            return 0;
        }else{
            return 1;
        }
    }

    public function viewQuiz($facId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `configquiz` WHERE facId=?");
        $query->bind_param('i', $facId);
        $query->execute();
        $sresult = $query->get_result();
        $sjson = $sresult->fetch_all(MYSQLI_ASSOC);

        return $sjson;
    }

    public function viewQuizwithquizId($quizId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `configquiz` WHERE quizId=?");
        $query->bind_param('i', $quizId);
        $query->execute();
        $sresult = $query->get_result();
        $sjson = $sresult->fetch_all(MYSQLI_ASSOC);

        return $sjson;
    }

    public function viewQuizQues($quizId)
    {
        $con = Database::connection();
        $query = $con->prepare("SELECT * FROM `questions` WHERE quizId=?");
        $query->bind_param('i', $quizId);
        $query->execute();
        $sresult = $query->get_result();
        $sjson = $sresult->fetch_all(MYSQLI_ASSOC);

        return $sjson;
    }

    public function deleteQuiz($quizId)
    {
        $con = Database::connection();
        $query = $con->prepare("DELETE FROM `configquiz` WHERE quizId=?");
        $query->bind_param('i', $quizId);
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function addQuestion($quizId,$facId,$ques,$opt1,$opt2,$opt3,$opt4,$answer)
    {
        $con = Database::connection();
        $query = $con->prepare("INSERT INTO `questions`(`quizId`, `facId`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`) VALUES (?,?,?,?,?,?,?,?)");
        $query->bind_param('iissssss', $quizId,$facId,$ques,$opt1,$opt2,$opt3,$opt4,$answer);
        if ($query->execute()) {
            return 0;
        } else {
            return 1;
        }
    }
}


?>
