<?php
    session_start();
    if(!isset($_SESSION) || !isset($_SESSION["id_emp"]) || $_SESSION["id_emp"] == "") {
        header("Location: index.php");
    }
?>