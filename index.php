<?php
require_once(__DIR__."/error/handler.php");
define("DEFAULT_PAGE", "home");
$page = trim($_GET["page"]);
$page = $page && $page!="." && $page!=".." ? $page : DEFAULT_PAGE;
$pages = scandir(__DIR__."/pages");
if (!in_array($page, $pages)) {
    $page = DEFAULT_PAGE;
}
$_GET["page"] = $page;
/*
$entity = $_SESSION["entity"] ? $_SESSION["entity"] : new stdClass;
print_r($entity->NOMBRE);
exit;
*/
define("CURRENCY_LABEL", "S./");
define("PAGE", "pages/$page/index.php");
include 'template/index.php';