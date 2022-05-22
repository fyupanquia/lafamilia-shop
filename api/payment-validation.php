<?php
if (!strlen($NOMBRE)) {
    throwError("Ingrese su nombre.");
}

if (!strlen($DIRECCION)) {
    throwError("Ingrese su dirección.");
}

if (strlen("$NUM_DOCUMENTO") != 8) {
    throwError("Su número de documento es inválido.");
}

if (!(strlen("$CELULAR") == 9 || strlen("$CELULAR") == 7)) {
    throwError("Su número de celular es inválido.");
}

if(!filter_var($EMAIL, FILTER_VALIDATE_EMAIL)){
    throwError("Su correo electrónico es inválido.");
}

if(!in_array($TIPO_PAGO, array("cashdelivery", "paypal"))){
    throwError("El tipo de pago es inválido.");
}

if($TIPO_PAGO=="paypal"){

    if (strlen($TARJETA)!=16){
        throwError("El número de su tarjeta es inválido.");
    }
    
    $dates = explode("/",$MMAA);
    if(count($dates)!=2) {
        throwError("La fecha de vencimiento de su tarjeta es inválida.");
    }

    $d1 = (int) $dates[0];
    $d2 = (int) $dates[1];
    $y = (int) date("y");

    if($d1<=0 || $d1>12 || $d2<$y){
        throwError("La fecha de vencimiento de su tarjeta es inválida.");
    }

    $d1 = $d1 < 10 ? "0$d1" : $d1;
    $MMAA = "$d1/$d2";

    if (!(strlen($CVV)==4 || strlen($CVV)==3)){
        throwError("El número de su CVV es inválido.");
    }
}
