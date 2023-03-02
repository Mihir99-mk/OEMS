<?php
include_once("../../services/facultys/Facultyservice.php");

$qid = $_GET["qid"];

$faculty = new FacultyService();

$data = $faculty->deleteQuiz($qid);

try{
    if($data == 0){
        header("Location: view-quiz.php");
    }else{
        throw new ErrorException("Server error occur");
    }
}catch(Exception $e){
    echo $e->getMessage();
}



?>
