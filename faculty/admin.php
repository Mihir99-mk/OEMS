<html>

<head>
  <title>Dashboard</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="admin.css" />
</head>

<?php
$style = "";
$s = "";
if (isset($_POST["loginbtn"])) {
  $s = "style='display:none;'";
} else {
  $evalue = "first login";
  $style = "style='display:none;'";
}
?>

<body>
  <?php include ('navbar.php'); ?>
  <div class="e" <?php echo $s; ?>>
    <h1><?php echo $evalue; ?></h1>
  </div>
  <div class="body" <?php echo $style; ?>>
    <div class="main">

      <div class="tab">
        <ul>
          <div class="logo">
            <h3>Exam Brain</h3>
          </div>
          <li id="homes">
            <a style="color: black; font-weight: bold" data-value=".home">Home</a>
          </li>
          <li id="quizs">
            <a style="color: black; font-weight: bold" data-value=".quiz">Create Quiz</a>
          </li>
          <li id="infos">
            <a style="color: black; font-weight: bold" data-value=".info">Manage Info</a>
          </li>
          <li id="students">
            <a style="color: black; font-weight: bold" data-value=".student">Manage Student</a>
          </li>
          <li id="views">
            <a style="color: black; font-weight: bold" data-value=".view">View Pervious Quiz</a>
          </li>
          <li id="results">
            <a style="color: black; font-weight: bold" data-value=".result">Result</a>
          </li>
        </ul>
      </div>

      <div class="f1">
        <div class="content">
          <div>
            <h2><?php echo "Welcome " . $_POST["e1"] . " <br>"; ?></h2>
          </div>
          <div class="home">
            <p>home</p>

          </div>

          <!-- ---------------------------------------------------------------------------------------------------------------------- -->
          <div class="quiz">
            <div id="f1">
              <!-- <form action="#">
                <label>Q1</label>
                <input type="text" name="q" id="q"><br>
                <label for="o1">Q1</label>
                <input type="text" name="o1" id="o1"><br>
                <label for="o2">Q2</label>
                <input type="text" name="o2" id="o2"><br>
                <label for="o3">Q3</label>
                <input type="text" name="o3" id="o3"><br>
                <label for="o4">Q4</label>
                <input type="text" name="o4" id="o4"><br>
              </form> -->
              <p>add questions</p>
            </div>


            <div class="add">

            </div>
            <button type="button" id="add">Add new</button>

          </div>

          <!-- -------------------------------------------------------------------------------------------------- -->

          <div class="info">
            <p>info</p>
          </div>

          <!-- -------------------------------------------------------------------------------------------------- -->

          <div class="student">
            <p>student</p>
          </div>

          <!-- -------------------------------------------------------------------------------------------------- -->

          <div class="view">
            <p>view</p>
          </div>

          <!-- -------------------------------------------------------------------------------------------------- -->

          <div class="result">
            <p>result</p>
          </div>

          <!-- -------------------------------------------------------------------------------------------------- -->


        </div>
      </div>
    </div>

  </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="admin.js"></script>
</body>

</html>