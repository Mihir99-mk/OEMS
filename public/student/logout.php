<?php
// include_once '../src/logout.php';
session_start();
if (isset($_SESSION['IS_STUD_LOGIN'])) {
    // unset($_SESSION['FacId']);
    unset($_SESSION['IS_STUD_LOGIN']);
    session_destroy();
    header("Location: ./login.php");
} 

// $logout = new Logout();
// $logout->logout();
