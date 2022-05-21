<?php
header('Content-Type: application/json; charset=utf-8');
include __DIR__."/connection.php";
include __DIR__.'/util.php';

resolveEntityIfExists();

$login = new stdClass;
$login->email = trim($_POST['email']);
$login->password = trim($_POST['password']);

if ($login->email == "" || $login->password == ""){
    throwError("Email o contraseña no pueden ser vacíos");
}

$db = getConnection();
$stmt = $db->prepare("  SELECT 
                            `ID`, `EMAIL`, `PASSWORD`, 
                            `NUM_DOCUMENTO`,`TIPO_DOCUMENTO`,`RAZON_SOCIAL`,
                            `TIPO`,`DIRECCION`, `NOMBRE`, `IMG_URL`
                        FROM `ENTIDADES` 
                        WHERE email=:email;");
$stmt->bindValue(':email', $login->email, PDO::PARAM_STR);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_OBJ);
if(!$record || !password_verify($login->password, $record->PASSWORD)) {
    throwError("Email o contraseña inválidos");
}

reolveEntity($record);