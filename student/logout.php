<?php
   session_start();
       unset($_SESSION["email"]);
       unset($_SESSION["password"]);
    // session_unset();

    // destroy the session
    // session_destroy();
   echo 'You have cleaned session';
   header('Refresh: 2; URL = login.php');
