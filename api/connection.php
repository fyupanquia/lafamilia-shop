<?php
require_once(__DIR__."/../error/handler.php");
function getConnection () {
   include(__DIR__.'/config.php');
   $conn = new PDO("mysql:host=$config->servername;dbname=$config->db", $config->username, $config->password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   return $conn;
}