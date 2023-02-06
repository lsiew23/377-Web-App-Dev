<?php

include('library.php');

extract($_REQUEST);

$conn = get_database_connection();

$sql = "DELETE FROM tickets WHERE tkt_id = $id";

if ($conn->query($sql) == TRUE) {
    header('Location: ticketList.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>