<?php
require_once __DIR__."/../../api/util/entities.php";

$entity = new stdClass;
$entity->TIPO=$_POST['tipo'];
$entity->NOMBRE=$_POST['nombre'];
$entity->RAZON_SOCIAL=$_POST['razon_social'];
$entity->EMAIL=$_POST['email'];
$entity->NUM_DOCUMENTO=$_POST['num_documento'];
$entity->TIPO_DOCUMENTO=$_POST['tipo_documento'];
$entity->DIRECCION=$_POST['direccion'];
$entity->CELULAR=$_POST['celular'];
$entity->PASSWORD=password_hash($_POST['password'], PASSWORD_DEFAULT);

if ($_FILES["foto"] && $_FILES["foto"]["name"]) {
    $allowed_extensions = ["png", "jpg"];
    $filename = $_FILES["foto"]["name"];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if(!in_array($ext, $allowed_extensions)) {
        header('Location: /admin/entidades');
    }    
}

$insert = insertEntity($entity, array("TIPO", "NOMBRE", 
                                        "RAZON_SOCIAL", "EMAIL", 
                                        "NUM_DOCUMENTO", "TIPO_DOCUMENTO", 
                                        "DIRECCION", "CELULAR", 
                                        "PASSWORD"));
$entity->ID = $insert->ID;
if ($_FILES["foto"] && $_FILES["foto"]["name"]) {
    $tempname = $_FILES["foto"]["tmp_name"];
    $relativepath = "/assets/img/entities/entity-{$insert->ID}.$ext";
    $entity->IMG_URL=$relativepath;
    $move = move_uploaded_file($tempname, __DIR__."/../../$relativepath");
} else {
    $entity->IMG_URL="/assets/img/entities/incognito.jpg";
}
updateEntity($entity,array("IMG_URL"));

header('Location: /admin/entidades');