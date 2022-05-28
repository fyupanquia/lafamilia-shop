<?php
header('Content-Type: application/json; charset=utf-8');
include __DIR__."/connection.php";
include __DIR__.'/util.php';

resolveEntityIfExists();

$newUser = new stdClass;
$newUser->email = trim($_POST['email']);
$newUser->password = trim($_POST['password']);

if ($newUser->email == "" || $newUser->password == ""){
    throwError("Email o contraseña no pueden ser vacíos");
} else if (strlen($newUser->password)>10 || strlen($newUser->password)<6){
    throwError("La longitud de tu contraseña debe ser entre 6 y 10 caracteres");
}
$newUser->password = password_hash($newUser->password, PASSWORD_DEFAULT);
$db = getConnection();
$stmt = $db->prepare("SELECT `ID`, `EMAIL`, `PASSWORD`, 
                        `NUM_DOCUMENTO`,`TIPO_DOCUMENTO`,`RAZON_SOCIAL`,`TIPO`,`DIRECCION` 
                        FROM `ENTIDADES` WHERE email=:email;");
$stmt->bindValue(':email', $newUser->email, PDO::PARAM_STR);
$stmt->execute();
if($stmt->fetch(PDO::FETCH_OBJ)){
    throwError("Este usuario ya se encuentra registrado.");
}

$inserUserSQL = "INSERT INTO 
    `ENTIDADES`(`EMAIL`, `PASSWORD`, `NUM_DOCUMENTO`, `TIPO_DOCUMENTO`, `RAZON_SOCIAL`, `TIPO`, `DIRECCION`) 
    VALUES ('$newUser->email', '$newUser->password', NULL, NULL, NULL, 'CLIENTE', NULL);";
$rsp = $db->exec($inserUserSQL);


$record = new stdClass;
$record->ID = $db->lastInsertId();
$record->EMAIL = $newUser->email;
$record->TIPO = 'CLIENTE';
reolveEntity($record);