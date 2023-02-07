<?php

/*************************************************************************************************
 * ticketNew.php
 *
 * Content page to display an entry form for a new ticket. This page is expected to be contained
 * within index.php.
 *************************************************************************************************/

?>

<h2>New Ticket</h2>

<form action="insert.php" method="POST">
    <div class="mb-3">
        <label for="problem" class="form-label">Problem</label>
        <input type="text" class="form-control" name="problem">
    </div>
    <div class="mb-3">
        <label for="priority" class="form-label">Priority</label>
        <select class="form-select" name="priority">
            <option value="1">High</option>
            <option value="2">Medium</option>
            <option value="3">Low</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="contactEmail" class="form-label">Contact Email Address</label>
        <input type="email" class="form-control" name="contactEmail">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="index.php?content=list" class="btn btn-secondary" role="button">Cancel</a>
</form>