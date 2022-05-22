<?php
require_once(__DIR__."/error/handler.php");
require_once(__DIR__."/core/pages.php");

$page = getPage($_GET["page"]);

define("CURRENCY_LABEL", "S./");
define("PAGE", "pages/$page/index.php");
include 'template/index.php';