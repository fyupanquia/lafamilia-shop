<?php
require_once __DIR__."/../../api/util/entities.php";
if($_POST['id']) {
    $entity = new stdClass;
    $entity->ID = $_POST['id'];
    deleteEntity($entity);
}
header("Location: /admin/entidades");