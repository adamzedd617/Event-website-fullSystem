<?php
session_start();

$_SESSION["crewid"] = "";
session_destroy();
header("Location: ../function/crewlogin-page.php");

?>