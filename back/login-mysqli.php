<?php
session_start();
$error='';

if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
}
else
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    include("connection.php");

    $username    = mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
    $password =  sha1($password);

    $sql = "SELECT email, password FROM users WHERE email = '" . $username . "' and password='".$password."';";
    $query=mysqli_query($con,$sql);
    $counter=mysqli_num_rows($query);
    if ($counter==1){
        $_SESSION['login_user_sys']=$username;
        header("location: index.php");
    } else {
        $error = "El correo electrónico o la contraseña es inválida.";
    }
}