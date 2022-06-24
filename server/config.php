<?php
    $baseurl = "http://127.0.0.1:5500/";
    $mysqli = new mysqli("localhost", "root", "whoami", "marwan_db");

    if($mysqli->connect_errno)
    {
        die("Connection error [" . $mysqli->connect_errno . "] " . $mysqli->connect_error);
        $mysqli->exit;
    }