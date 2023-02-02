<?php

include('library.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ticketing System</title>
        <script>
            function deleteTicket(id) {
                if (confirm("Are you sure you want to delete ticket #" + id + "?")) {
                    alert('Delete...');
                    location.href = "ticketDelete.php?id=" + id;
                    
                }
            }
    </head>

    <body>
        <h1>Ticket List</h1>

        <table border = "1">
            <tr>
                <th>ID</th>
                <th>Problem</th>
                <th>Priority</th>
                <th>Contact Email</th>
                <th> Delete</th>

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
            echo "<td>". $row['tkt_priority'] . "</td>";
            echo "<td><a href='mailto:" . $row['tkt_contact_email'] . "'>" . $row['tkt_contact_email'] . "</a></td>";
            echo "<td><button onclick='deleteTicket(" . $row['tkt_id'] . ")'>Delete</button></td>";

            echo "</tr>";

        }

        ?>
    
    
    </body>
</html>