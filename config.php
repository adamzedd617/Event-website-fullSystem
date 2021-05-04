<?php

function error(){
    global $con;
    if($con === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
}

function delete(){
    global $con;
    global $sql;
    unset($con);
    unset($sql);
}

function refresh(){
    $page = '../index.html';
    $sec = "10";
    header("Refresh: $sec; url=$page");
}

    //variables Database 
    $username="root";
    $password="";
    $host="localhost";
    $database="eventdb";

    //Create Database
    $con=mysqli_connect("$host", "$username", "$password","$database") or die("Cannot connect to
server.".mysqli_error($con));

    //Create table participate
	$sql = "CREATE TABLE participate(
			userid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL,
            study VARCHAR(100) NOT NULL,
			phone VARCHAR(100) NOT NULL,
			email VARCHAR(255) NOT NULL,
            address VARCHAR(100) NOT NULL,
            city VARCHAR(100) NOT NULL,
            username VARCHAR(255) NOT NULL,
			password VARCHAR(255) NOT NULL,
			created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)";
    mysqli_query($con,$sql);
    delete();



    //Create table crew
	$sql = "CREATE TABLE crew(
        crewid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        cname VARCHAR(255) NOT NULL,
        department VARCHAR(255) NOT NULL,
        cemail VARCHAR(255) NOT NULL,
        cusername VARCHAR(255) NOT NULL,
        cpassword VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    mysqli_query($con,$sql);
    delete();



?>

