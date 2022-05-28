<?php
require_once __DIR__."/../../api/util/entities.php";

$entity = new stdClass;
$entity->ID=$_POST['id'];
$entity->TIPO=$_POST['tipo'];
$entity->NOMBRE=$_POST['nombre'];
$entity->RAZON_SOCIAL=$_POST['razon_social'];
$entity->EMAIL=$_POST['email'];
$entity->NUM_DOCUMENTO=$_POST['num_documento'];
$entity->TIPO_DOCUMENTO=$_POST['tipo_documento'];
$entity->DIRECCION=$_POST['direccion'];
$entity->CELULAR=$_POST['celular'];

$fields = array("TIPO", "NOMBRE", "RAZON_SOCIAL", "EMAIL", "NUM_DOCUMENTO", "TIPO_DOCUMENTO", "DIRECCION", "CELULAR");
if($_POST['password']) {
    $entity->PASSWORD=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $fields[] = "PASSWORD";
}

if ($_FILES["foto"] && $_FILES["foto"]["name"]) {
    $allowed_extensions = ["png", "jpg"];
    $filename = $_FILES["foto"]["name"];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if(!in_array($ext, $allowed_extensions)) {
        header('Location: /admin/entidades');
    }
    
    $tempname = $_FILES["foto"]["tmp_name"];
    $relativepath = "/assets/img/entities/entity-{$insert->ID}.$ext";
    $entity->IMG_URL=$relativepath;
    $move = move_uploaded_file($tempname, __DIR__."/../../$relativepath");
    $fields[] = "IMG_URL";
}


updateEntity($entity, $fields);

header("Location: /admin/entidades/actualizar.php?id={$entity->ID}");