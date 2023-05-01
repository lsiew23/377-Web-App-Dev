
<?php

/*************************************************************************************************
 * permitList.php
 *
 * Content page to display a list of permits. This page is expected to be contained within
 * index.php.
 *************************************************************************************************/

?>

<script>
    function deletePermit(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            location.href = 'delete.php?id=' + id;
        }
    }
</script>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Applicant</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Field(s)</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
    <tbody>

    <?php

    $conn = get_database_connection();

    // Build the SELECT statement
    $sql = <<<SQL
    SELECT *
      FROM applications
      JOIN customers ON cus_id = app_cus_id
     ORDER BY app_date, cus_last_name, cus_first_name, app_id

    SQL;

    // Execute the query and save the results
    $result = $conn->query($sql);

    // Iterate over each row in the results
    while ($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>" . $row['app_id'] . "</td>";
        echo "<td>" . $row['cus_last_name'] . ", ". $row['cus_first_name'] . "</td>";
        echo "<td>" . $row['cus_phone'] . "</td>";
        echo "<td><a href='mailto:". $row['cus_email'] . "'>" . $row['cus_email'] . "</a></td>";
        echo "<td>";
        echo "<a href='index.php?content=detail&id=" . $row['app_id'] . "' title='Edit this application'><i class='fa fa-pencil' aria-hidden='true'></i></a> ";
        echo "<a href='javascript:deleteTicket(" . $row['app_id'] . ")' title='Delete this application'><i class='fa fa-trash-o' aria-hidden='true'></i></a>";
        echo "</td>";
        echo "</tr>";
    }

    ?>

    </tbody>
</table>

<a href="index.php?content=new" class="btn btn-primary" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add a permit</a>
