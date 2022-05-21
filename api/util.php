<?php
require_once(__DIR__."/../error/handler.php");
function throwError($message){
    $obj = new stdClass;
    $obj->success = false;
    $obj->message = $message;
    echo json_encode($obj);
    exit;
}

function resolveEntityIfExists(){
    if($_SESSION['entity']) {
        $obj = new stdClass;
        $obj->success = true;
        $obj->body = json_decode($_SESSION['entity']);
        echo json_encode($obj);
        exit;
    }
}

function reolveEntity($record){
    $obj = new stdClass;
    $obj->success = true;
    unset($record->ID);
    unset($record->PASSWORD);
    $obj->body = $record;
    $_SESSION['entity'] = $record;

    echo json_encode($obj);
    exit;
}