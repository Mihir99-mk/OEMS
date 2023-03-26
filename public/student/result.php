<?php
session_start();
include_once("../../services/students/Studentservice.php");
$studId = $_SESSION["studId"];
$student = new StudentService();
if (isset($_GET["quizId"])) {
    $correct = 0;
    $wrong = 0;
    $total = 0;
    $facId = 0;

    if (isset($_SESSION["answer"])) {
        $quizId = $_GET["quizId"];
        $answ = $_SESSION["answer"];

        foreach ($answ as $i => $v) {
            $answers = "";
            $items = $student->QuizDataCheck($quizId, $i);

            $total = count($items);
            foreach ($items as $item) {
                $answers = $item["answer"];
                $facId = $item["facId"];
                $items = $student->configquiz($quizId);
                // $completeCheck = $student -> QuizComplete($quizId,$student, 0);
                foreach ($items as $v) {
                    $total = $v["noofques"];


                    if (isset($_SESSION["answer"][$i])) {

                        if ($answers == $_SESSION["answer"][$i]) {
                            $correct = $correct + $v["eachMark"];
                        } else {
                            $wrong = $wrong + $v["eachMark"];
                        }
                    } else {
                        $wrong = $wrong + $v["eachMark"];
                    }
                }
            }
        }
    }

    $result = $student->QuizResult($studId, $quizId, $correct, $wrong, $total, $correct);

    print_r($result);
    try {
        if ($result == 0) {
            $items = $student->QuizComplete($quizId, $studId, 0);
            
            if ($items == 0) {
                header("Location: dashboard.php");
            } else {
            }
            header("Location: dashboard.php");
        } else {
            throw new Exception("Error occurs in result generation", 1);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}   // header("Location: dashboard.php");

$_SESSION["exam_start"] = false;

?>