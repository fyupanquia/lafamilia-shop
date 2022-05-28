<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 
$entity = $_SESSION["entity"];
if (!$entity || $entity->TIPO!="VENDEDOR") {
    header("location: /");
    exit;
}