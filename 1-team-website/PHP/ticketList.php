<html lang="en">
    <head>
        <title>Ticketing System</title>
    </head>

    <body>
        <h1>Ticket List</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Problem</th>
                <th>Priority</th>
                <th>Contact Email</th>


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
            echo "<td>". $row['tkt_problem'] . "<td>";
            echo "<td>". $row['tkt_priority'] . "<td>";
            echo "<td>". $row['tkt_contact_email'] . "<td>";
            echo $row['tkt_problem'];
        }

        ?>
    
    </body>
</html>