<?php
   session_start();
       unset($_SESSION["email"]);
       unset($_SESSION["password"]);
       unset($_SESSION['IS_LOGIN']);
    // session_unset();

    // destroy the session
    // session_destroy();
   echo 'You have cleaned session';
   header('Refresh: 2; URL = login.php');
