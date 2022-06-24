<?php
// include configuratin file
include "config.php";

header("Content-Type: application/json");

$restJson = json_decode(file_get_contents("php://input"));

echo updateOrder();

function updateOrder()
{
    global $restJson, $mysqli;

    $orderid = $restJson->id;

    $data = new stdClass();

    // check rows
    $mysqli->query("UPDATE `orders` SET `status` = 'selesai', `updated_at` = NOW() WHERE `orderID` = '$orderid'");
    if($mysqli->affected_rows == 1)
    {
        $data->status = "success";
    }  
    else
    {
        $data->status = "failed";
    }

    return json_encode($data);
}