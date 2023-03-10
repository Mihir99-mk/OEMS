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

                if (isset($_SESSION["answer"][$i])) {

                    if ($answers == $_SESSION["answer"][$i]) {
                        $correct = $correct + 1;
                    } else {
                        $wrong = $wrong + 1;
                    }
                } else {
                    $wrong = $wrong + 1;
                }
            }
        }
    }
    $items = $student->configquiz($quizId);
    foreach ($items as $v) {
        $total = $v["noofques"];
    }
    $result = $student->QuizResult($facId, $studId, $quizId, $correct, $wrong, $total, $correct);
    try {
        if ($result == 0) {
            header("Location: dashboard.php");
        } else {
            throw new Exception("Error occurs in result generation", 1);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}else{
    header("Location: dashboard.php");
}

?>