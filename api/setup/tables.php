<?php
include('../connection.php');

try {
    $bd = getConnection();
     $ENTIDADES ="CREATE TABLE `ENTIDADES`
     (
         `ID` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
         `EMAIL` VARCHAR(50) NOT NULL UNIQUE,
         `PASSWORD` VARCHAR(100) NOT NULL,
         `NUM_DOCUMENTO` VARCHAR(11) UNIQUE,
         `TIPO_DOCUMENTO` CHAR(3),
         `RAZON_SOCIAL` VARCHAR(50),
         `TIPO` VARCHAR(10),
         `DIRECCION` VARCHAR(200),
         `NOMBRE` VARCHAR(50),
         `IMG_URL` VARCHAR(250)
    );" ;

    $PRODUCTOS ="CREATE TABLE `PRODUCTOS`
     (
         `ID` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
         `NOMBRE` VARCHAR(50),
         `DESCRIPCION` TEXT,
         `PRECIO` DECIMAL(10,2),
         `ULTIMO_PRECIO` DECIMAL(10,2),
         `IMG_URL` VARCHAR(250),
         `CATEGORIA` VARCHAR(15),
         `BADGE` VARCHAR(200),
         `GRUPO` VARCHAR(10)
    );" ;
    //$bd->exec($ENTIDADES);
    $bd->exec($PRODUCTOS);
        
} catch(PDOException $e) {
    echo $e->getMessage();
}