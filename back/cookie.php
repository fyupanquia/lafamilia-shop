<?php
include "config.php";

function encryptCookie( $userid ) {

    $key = hex2bin(openssl_random_pseudo_bytes(4));

    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);

    $ciphertext = openssl_encrypt($userid, $cipher, $key, 0, $iv);

    return( base64_encode($ciphertext . '::' . $iv.'::'.$key) );
}

function decryptCookie( $ciphertext ) {

    $cipher = "aes-256-cbc";

    list($encrypted_data, $iv,$key) = explode('::', base64_decode($ciphertext));
    return openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);

}

if( isset($_SESSION['userid']) ){
    header('Location: index.php');
    exit;
}else if( isset($_COOKIE['rememberme'] )){

    $userid = decryptCookie($_COOKIE['rememberme']);

    $stmt = $conn->prepare("SELECT count(*) as cntUser FROM users WHERE id=:id");
    $stmt->bindValue(':id', (int)$userid, PDO::PARAM_INT);
    $stmt->execute(); 
    $count = $stmt->fetchColumn();

    if( $count > 0 ){
        $_SESSION['userid'] = $userid; 
        header('Location: index.php');
        exit;
    }
}