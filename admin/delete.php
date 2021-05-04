<?php

session_start();
include '../config.php';

$user=$_GET['user'];
$id=$_GET['id'];
if($user === "crew"){
    $sql_delete="DELETE FROM $user WHERE crewid='$id' ";  
    $sql_result=mysqli_query($con,$sql_delete) or die("Cannot execute sql.");

    if($sql_result){
    ?>
        <script type="text/javascript">
            alert("Delete Successfull.");
            window.location = "index.php";
        </script>
    <?php
    }

    else{
        echo "Error in deleting the data";
    }    
}else{
    $sql_delete="DELETE FROM $user WHERE userid='$id' ";  
    $sql_result=mysqli_query($con,$sql_delete) or die("Cannot execute sql.");

    if($sql_result){
    ?>
        <script type="text/javascript">
            alert("Delete Successfull.");
            window.location = "index.php";
        </script>
    <?php
    }

    else{
        echo "Error in deleting the data";
    }    
}







?>