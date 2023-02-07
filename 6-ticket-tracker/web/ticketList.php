<?php

/*************************************************************************************************
 * ticketList.php
 *
 * Content page to display a list of tickets. This page is expected to be contained within
 * index.php.
 *************************************************************************************************/

?>

<script>
    function deleteTicket(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            location.href = 'delete.php?id=' + id;
        }
    }
</script>

<h2>All Tickets</h2>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Problem</th>
            <th>Resolution</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

    <?php

    $conn = get_database_connection();

    // Build the SELECT statement
    $sql = "SELECT * FROM tickets";

    // Execute the query and save the results
    $result = $conn->query($sql);

    // Iterate over each row in the results
    while ($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>" . $row['tkt_id'] . "</td>";
        echo "<td>" . $row['tkt_problem'] . "</td>";
        echo "<td>" . $row['tkt_resolution'] . "</td>";
        echo "<td>" . $row['tkt_priority'] . "</td>";
        echo "<td>" . $row['tkt_status'] . "</td>";
        echo "<td><a href='mailto:". $row['tkt_contact_email'] . "'>" . $row['tkt_contact_email'] . "</a></td>";
        echo "<td>";
        echo "<a href='index.php?content=detail&id=" . $row['tkt_id'] . "' title='Edit this ticket'><i class='fa fa-pencil' aria-hidden='true'></i></a> ";
        echo "<a href='javascript:deleteTicket(" . $row['tkt_id'] . ")' title='Delete this ticket'><i class='fa fa-trash-o' aria-hidden='true'></i></a>";
        echo "</td>";
        echo "</tr>";
    }

    ?>

    </tbody>
</table>

<a href="index.php?content=new" class="btn btn-primary" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add a ticket</a>
