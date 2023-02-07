<?php

/*************************************************************************************************
 * delete.php
 *
 * Page to delete a single ticket. This page expects the 'id' request paramater to be set.
 *************************************************************************************************/

include('library.php');

$conn = get_database_connection();

// Build the DELETE statement
$sql = <<<SQL
DELETE FROM tickets WHERE tkt_id = {$id}
SQL;

// Execute the query and redirect to the list
if ($conn->query($sql) == TRUE)
{
    header('Location: index.php?content=list');
}
else
{
    echo "Error deleting record: " . $conn->error;
}

$conn->close();