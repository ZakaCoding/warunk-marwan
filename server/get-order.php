<?php
// include configuratin file
include "config.php";

header("Content-Type: application/json");

$restJson = json_decode(file_get_contents("php://input"));

echo getOrder();

function getOrder()
{
    global $restJson, $mysqli;

    $orderid = $restJson->id;

    $data = new stdClass();

    // check rows
    $query = $mysqli->query("SELECT * FROM `orders` WHERE `orderID` = '$orderid'");
    if($query->num_rows == 1)
    {
        $fetch = $query->fetch_assoc();

        $data->status = "success";
        $data->data = $fetch['data'];
        $data->price = $fetch['total_price'];
    }  
    else
    {
        $data->status = "failed";
    }

    return json_encode($data);
}