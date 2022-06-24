<?php
    $baseurl = "http://marwanklik.com/";
    $mysqli = new mysqli("203.175.9.13", "marq3935", "5erAEEhag7ZT19", "marq3935_marwan_db");

    if($mysqli->connect_errno)
    {
        die("Connection error [" . $mysqli->connect_errno . "] " . $mysqli->connect_error);
        $mysqli->exit;
    }