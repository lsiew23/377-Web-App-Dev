<?php

/*************************************************************************************************
 * insert.php
 *
 * Page to insert (save) a single ticket. This page expects the following request paramaters to
 * be set:
 *
 * - problem
 * - priority
 * - contactEmail
 *************************************************************************************************/

include('library.php');

extract($_REQUEST);

$conn = get_database_connection();

// Sanitize all input values to prevent SQL injection exploits
$problem = $conn->real_escape_string($problem);
$contactEmail = $conn->real_escape_string($contactEmail);

// Build the INSERT statement
$sql = <<<SQL
INSERT INTO tickets (tkt_problem, tkt_priority, tkt_contact_email)
       VALUES ('{$problem}', $priority, '{$contactEmail}')
SQL;

// Execute the query and redirect to the list
if ($conn->query($sql) == TRUE)
{
    header('Location: index.php?content=list');
}
else
{
    echo "Error inserting record: " . $conn->error;
}

$conn->close();