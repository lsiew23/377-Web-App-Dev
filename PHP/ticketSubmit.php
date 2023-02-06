<?php

include('library.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thank You For Submitting Your Problem.</h1>

    <p>You can check the status of this ticket with ID_____.</p>

    <?php
    extract($_REQUEST);

    $conn = get_database_connection();

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="helpdesk";

    // connecting to database and checking connection
    $conn=new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("connection failed: ".$conn->connect_error);
    }


    // sanitization(Prevents SQL injection exploits)
    $problem=$conn->real_escape_string($problem);
    $contactEmail=$conn->real_escape_string($contactEmail);

    // Build Insert Statement
    $sql="INSERT INTO tickets(tkt_problem, tkt_priority, tkt_contact_email)" .
    "VALUES ('$problem', $priority, '$contactEmail')";

    echo $sql;

    $conn->query($sql)


    ?>
    <br/>
    <br/>
    <a href="ticketform.php">Back to the Ticket Form</a>

    <br/>
    <br/>
    <a href="ticketlist.php">Back to the Ticket List</a>

    
</body>
</html>