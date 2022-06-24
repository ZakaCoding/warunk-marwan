<?php
    // include configuratin file
    include "config.php";

    header("Content-Type: application/json");

    $restJson = json_decode(file_get_contents("php://input"));

    echo addData();

    function addData()
    {
        global $restJson, $mysqli;

        $username = $restJson->name;
        $orderID = $restJson->id;
        $jsonData = json_encode($restJson->data);
        $totalPrice = $restJson->total;
        // created at default mysql
        // updated at default mysql
        $status = '';

        // create response message
        $callback = new stdClass();

        // store to database
        $query = "INSERT INTO `orders` VALUES(NULL, '$username' , '$orderID', '$jsonData','$totalPrice', NOW(), NULL, '$status')";
        // query check
        if($mysqli->query($query))
        {
            // success callback
            $callback->status = "success";
            $callback->message = "Data stored to database order created";
            $callback->orderID = $orderID;
        }
        else
        {
            // failed callback
            $callback->status = "failed";
            $callback->message = $mysqli->error;
        }

        return json_encode($callback);
    }
        