<?php
    $baseurl = "http://localhost/warunk-marwan/";
    $mysqli = new mysqli("localhost", "root", "whoami", "marwan_db");

    if($mysqli->connect_errno)
    {
        die("Connection error [" . $mysqli->connect_errno . "] " . $mysqli->connect_error);
        $mysqli->exit;
    }