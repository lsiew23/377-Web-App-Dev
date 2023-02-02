<?php

include('library.php');

extract($request);

$conn = get_database_connection();

$SQL = "DELETE FROM tickets WHERE tkt_id = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: ticketList.php');
} ellse {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();



?>