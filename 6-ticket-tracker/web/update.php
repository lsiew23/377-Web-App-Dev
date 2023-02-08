<?php

/*************************************************************************************************
 * update.php
 *
 * Page to insert (save) a single ticket. This page expects the following request paramaters to
 * be set:
 *
 * - id
 * - problem
 * - priority
 * - contactEmail
 * - resolution
 * - status
 *************************************************************************************************/

include('library.php');

$conn = get_database_connection();

// Sanitize all input values to prevent SQL injection exploits
$problem = $conn->real_escape_string($problem);
$contactEmail = $conn->real_escape_string($contactEmail);
$resolution = $conn->real_escape_string($resolution);
$status = $conn->real_escape_string($status);



// Build the INSERT statement
$sql = <<<SQL
UPDATE tickets 
SET tkt_problem = '{$problem}',
    tkt_priority = '{$prioritya}',
    tkt_contact_email = '{$contactEmail}',
    tkt_resolution = '{$resolution}',
    tkt_status = '{$status}'
WHERE tkt_id = {$id}
SQL;

// Execute the query and redirect to the list
if ($conn->query($sql) == TRUE)
{
    header('Location: index.php?content=list');
}
else
{
    echo "Error inserting record: " . $conn->error;
    echo 
}

$conn->close();