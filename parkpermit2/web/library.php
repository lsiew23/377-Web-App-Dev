<?php

/*************************************************************************************************
 * library.php
 *
 * Common environment settings and functions used througout the Ticket Tracker application.
 * 
 *************************************************************************************************/

extract($_REQUEST);

/*
 * Returns the content to be included based on the 'content' request parameter, if present.
 */
function get_content()
{
    global $content;

    if (!isset($content))
    {
        $content = 'list';
    }

    $content = 'permit' . ucfirst(strtolower($content)); // list --> permitlist

    return $content;
}

/*
 * Returns a connection to the underlying MySQL database.
 */
function get_database_connection()
{
    $servername = 'localhost';
    //TODO: do not use 'root' 
    $username = 'root';
    $password = '';
    $dbname = 'dpw_park_permits';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die('Connection failed: ' . $conn->connect_error);
    }

    return $conn;
}
