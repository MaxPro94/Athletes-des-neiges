<?php

if (!empty($_GET['action'])) {
    $action = $_GET['action'];

    $path = "../src/actions/$action.php";

    if (file_exists($path)) {
        require '../src/data/db-connect.php';
        require $path;

        header('Content-type: application/json; chartset=utf-8');
        echo json_encode($data);
    } else {
        header('HTTP/1.1 500 No Record Found');
    }
}
