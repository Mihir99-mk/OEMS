<?php

session_start();
include_once("../../services/students/Studentservice.php");

$studId = $_SESSION["studId"];
$student = new StudentService();

$quizId = $_GET["qid"];
$items_per_page = 1;
$pg = (int)$_GET["page"];
$current_page = isset($pg) ? $pg : 1;
$offset = (int)($current_page - 1) * $items_per_page;
$items = $student->QuizData($quizId, $offset, $items_per_page);
$total_items = $student->QuizDataCount($quizId);
$total_pages = ceil($total_items / $items_per_page);
$a = (int)$offset + 1;

if (isset($_SESSION["answer"][$a])) {
    $dh = $_SESSION["answer"];
    $ans = $dh[$a];
} else {
    $ans = null;
}



if (count($items) >= 0) {
?>
    <form method="POST">
        <div class="card" style="width: 42rem;" id="form-card">
            <?php
            foreach ($items as $item) {
                // if(isset($_SESSION["answer"])){

                //  $_SESSION["answer"];
                // print_r($ans);
            ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h4><?php echo $item["question"] ?></h4>
                    </li>



                    <li class="list-group-item"><input type="radio" value="<?php echo $item["opt1"] ?>" name="s1[]" onclick="read(<?php echo $pg ?>, this.value)" id="aradio" <?php
                                                                                                                                                                                if ($ans == $item["opt1"]) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } else {
                                                                                                                                                                                }
                                                                                                                                                                                ?> /> <?php echo  $item["opt1"] ?></li>

                    <li class="list-group-item"><input type="radio" value="<?php echo $item["opt2"] ?>" name="s1[]" onclick="read(<?php echo $pg ?>, this.value)" id="aradio" <?php
                                                                                                                                                                                if ($ans == $item["opt2"]) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } else {
                                                                                                                                                                                }
                                                                                                                                                                                ?> /> <?php echo  $item["opt2"] ?></li>

                    <li class="list-group-item"><input type="radio" value="<?php echo $item["opt3"] ?>" name="s1[]" onclick="read(<?php echo $pg; ?>,this.value)" id="aradio" <?php
                                                                                                                                                                                if ($ans == $item["opt3"]) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } else {
                                                                                                                                                                                }
                                                                                                                                                                                ?> /> <?php echo  $item["opt3"] ?></li>

                    <li class="list-group-item"><input type="radio" value="<?php echo $item["opt4"] ?>" name="s1[]" onclick="read(<?php echo $pg; ?>, this.value)" id="aradio" <?php
                                                                                                                                                                                if ($ans == $item["opt4"]) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } else {
                                                                                                                                                                                }
                                                                                                                                                                                ?> /> <?php echo  $item["opt4"] ?></li>



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

                <li class="page-item"><a class="page-link" id="<?php echo $i ?>" aria-label="Next">Next &raquo;</a></li>

            <?php
            } else {
            ?>

                <li class="page-item"><input type="submit" id="submit" class="page-link" value="Submit" name="submit" aria-label="Next" /></li>

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
<!-- <input type="button" id="submit" class="page-link" value="Submit" name="submit" aria-label="Next" /> -->