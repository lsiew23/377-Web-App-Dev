<?php

/*************************************************************************************************
 * ticketDetail.php
 *
 * Content page to display the detail form for a single ticket. This page is expected to be
 * contained within index.php.
 *************************************************************************************************/

$sql = <<<SQL
SELECT *
  FROM tickets
 WHERE tkt_id = {$id}
SQL;

$conn = get_database_connection();

$result = $conn->query($sql);

$row = $result->fetch_assoc();

?>

<h2>Details for Ticket #<?php echo $row['tkt_id']; ?></h2>

<form action="update.php" method="POST">
    <div class="mb-3">
        <label for="problem" class="form-label">Problem</label>
        <input type="text" class="form-control" name="problem" value="<?php echo $row['tkt_problem']; ?>">
    </div>
    <div class="mb-3">
        <label for="priority" class="form-label">Priority</label>
        <select class="form-select" name="priority">
            <option value="1" <?php  echo ($row['tkt_priority'] == 1 ? 'selected' : ''); ?>>High</option>
            <option value="2" <?php  echo ($row['tkt_priority'] == 2 ? 'selected' : ''); ?>>Medium</option>
            <option value="3" <?php  echo ($row['tkt_priority'] == 3 ? 'selected' : ''); ?>>Low</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="contactEmail" class="form-label">Contact Email Address</label>
        <input type="email" class="form-control" name="contactEmail" value="<?php echo $row['tkt_contact_email']; ?>">
    </div>
    <div class="mb-3">
        <label for="resolution" class="form-label">Resolution</label>
        <input type="text" class="form-control" name="resolution" value="<?php echo $row['tkt_resolution']; ?>">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" name="status">
            <option <?php  echo ($row['tkt_priority'] == 'Open' ? 'selected' : '');        ?>>Open</option>
            <option <?php  echo ($row['tkt_priority'] == 'In Progress' ? 'selected' : ''); ?>>In Progress</option>
            <option <?php  echo ($row['tkt_priority'] == 'Closed' ? 'selected' : '');      ?>>Closed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="index.php?content=list" class="btn btn-secondary" role="button">Cancel</a>
</form>