<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing System </title>
</head>
<body>

    <h1>Ticket Details</h1>

    <?php

    include('library.php');
    
    extract($_REQUEST);

    $conn = get_database_connection();

    $sql = "SELECT * FROM tickets WHERE tkt_id = $id";

    $conn->query($sql);

    $result = $conn->query($sql);

    $row = $result->fetch_assoc()

    ?>

    <form action='ticketSubmit.php' method='POST'>
        Problem:<br />
        <input type="text" name='problem' value='<?php echo $row['tkt_problem']; ?>'/><br/>

        Priority:<br/>
        <SELECT name="Priority">
            <option value="1" <?php echo ($row['tkt_priority'] == 1? 'selected = "true"' : ''); ?>>High</option>
            <option value="2" <?php echo ($row['tkt_priority'] == 2? 'selected = "true"' : ''); ?>>Medium</option>
            <option value="3" <?php echo ($row['tkt_priority'] == 3? 'selected = "true"' : ''); ?>>Low</option>
        </SELECT>
        <br/>

        Contact Email<br/>
        <input type="text" name="contactEmail" value='<?php echo $row['tkt_contact_email']; ?>'/><br/>

        Resolution:<br/>
        <input type="text" name="resolution" value='<?php echo $row['tkt_resolution'];?>'/><br/>
        
        Status:<br/>
        <SELECT name="Status">
            <option>Open</option>
            <option>In Progress</option>
            <option>Closed</option>
        </SELECT>

        <input type="submit">
    </form>
</body>
</html>