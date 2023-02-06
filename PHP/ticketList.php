<?php

include('library.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Ticketing System</title>
        <script>
            function deleteTicket(id) {
                if (confirm("Are you sure you want to delete ticket #" + id + "?")) {
                    // alert('Delete...');
                    location.href = "ticketDelete.php?id=" + id;
                }
            }
        </script>
    </head>

    <body>
        <h1>Ticket List</h1>

        <p><a href="ticketForm.php">Create New Ticket</a></p>


        <table border = "1">
            <tr>
                <th>ID</th>
                <th>Problem</th>
                <th>Resolution</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Contact Email</th>
                <th></th>

            </tr>


        <?php

        $servername="localhost";
        $username="root";
        $password="";
        $dbname="helpdesk";

        // connecting to database and checking connection
        $conn=new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
            die("connection failed: ".$conn->connect_error);
        }

        $sql = "SELECT * FROM tickets";

        $conn->query($sql);

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>". $row['tkt_id'] . "</td>";
            echo "<td>". $row['tkt_problem'] . "</td>";
            echo "<td>". $row['tkt_resolution']. "</td>";
            echo "<td>". $row['tkt_priority'] . "</td>";
            echo "<td>". $row['tkt_status']. "</td>";
            echo "<td><a href='mailto:" . $row['tkt_contact_email'] . "'>" . $row['tkt_contact_email'] . "</a></td>";
            echo "<td>";
            echo "<a href='ticketEdit.php?id=". $row['tkt_id'] . "'><i class='fa fa-pencil' aria-hidden='true'></i></a>";
            echo "<a onclick='deleteTicket(" . $row['tkt_id'] . ")'><i class='fa fa-trash' aria-hidden='true'></i></a>";
            echo "</td>";
            echo "</tr>";

        }

        ?>
    
    
    </body>
</html>