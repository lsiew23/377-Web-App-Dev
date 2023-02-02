<?php

function get_database_connection()
{
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="helpdesk";

    // connecting to database and checking connection
    $conn=new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("connection failed: ".$conn->connect_error);
    }

    return $conn;
}
