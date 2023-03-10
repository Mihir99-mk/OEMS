<?php

error_reporting(0);
session_start();
include_once("../../services/students/Studentservice.php");

$studId = $_SESSION["studId"];
$student = new StudentService();

$quizId = $_GET["qid"];
$items_per_page = 1;
$pg = $_GET["page"];

$current_page = isset($pg) ? $pg : 1;

$offset = ($current_page - 1) * $items_per_page;

$items = $student->QuizData($quizId, $offset, $items_per_page);

$total_items = $student->QuizDataCount($quizId);

$total_pages = ceil($total_items / $items_per_page);



$page .= " ";
if (count($items) >= 0) {
?>
    <form method="POST">
        <div class="card" style="width: 18rem;" id="form-card">
            <?php
            foreach ($items as $item) {

            ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h4><?php echo $item["question"] ?></h4>
                    </li>

                    <?php
                    if (isset($_SESSION["answer"][$current_page])) {
                        $ans = $_SESSION["answer"][$current_page];
                    ?>

                        <li class="list-group-item"><input type="radio" value=" <?php echo $item["opt1"] ?>" name="s1[]" <?php
                                                                                                                            if ($ans == $item["opt1"]) {
                                                                                                                                echo "checked";
                                                                                                                            };
                                                                                                                            ?>id="aradio" /> <?php echo  $item["opt1"] ?></li>

                        <li class="list-group-item"><input type="radio" value=" <?php echo $item["opt2"] ?>" name="s1[]" <?php
                                                                                                                            if ($ans == $item["opt2"]) {
                                                                                                                                echo "checked";
                                                                                                                            };
                                                                                                                            ?>id="aradio" /> <?php echo  $item["opt2"] ?></li>

                        <li class="list-group-item"><input type="radio" value=" <?php echo $item["opt3"] ?>" name="s1[]" <?php
                                                                                                                            if ($ans == $item["opt3"]) {
                                                                                                                                echo "checked";
                                                                                                                            };
                                                                                                                            ?>id="aradio" /> <?php echo  $item["opt3"] ?></li>

                        <li class="list-group-item"><input type="radio" value=" <?php echo $item["opt4"] ?>" name="s1[]" <?php
                                                                                                                            if ($ans == $item["opt4"]) {
                                                                                                                                echo "checked";
                                                                                                                            };
                                                                                                                            ?>id="aradio" /> <?php echo  $item["opt4"] ?></li>


                    <?php
                    }
                    ?>
                </ul>

            <?php
            }
            ?>
    </form>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination" id="pagination">
            <?php
            if ($current_page > 1) {
            ?>
                <li class="page-item"><a class="page-link" id="<?php ($current_page - 1) ?>" aria-label="Previous">&laquo; Previous</a></li>
                <?php
            }
            for ($i = max(1, $current_page - 1); $i <= min($current_page + 1, $total_pages); $i++) {

                if ($i == $current_page) {
                ?>
                    <li class="page-item active"><a class="page-link"> <?php echo $i ?></a></li>
                <?php
                } else {
                ?>

                    <li class="page-item"><a class="page-link" id=" <?php echo $i ?>"> <?php echo $i ?></a></li>

                <?php
                }
            }

            if ($current_page < $total_pages) {
                ?>

                <li class="page-item"><a class="page-link" id=" <?php echo $i ?>" aria-label="Next">Next &raquo;</a></li>';

            <?php
            } else {
            ?>

                <li class="page-item"><input type="button" class="page-link" value="Submit" name="submit" aria-label="Next" /></li>';

            <?php
            }
            ?>

        </ul>
    </nav>
<?php
} else {
    echo "No Quiz found";
}
?>