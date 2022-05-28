<?php
include("conexion.php");

$codigo=$_REQUEST['codigo'];

$imagen=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$query="UPDATE productos SET photo='$imagen' WHERE codigo='$codigo'";
$resultado=$con->query($query);

if ($resultado) {
    
    //if (move_uploaded_file($tmpname, $destino)) {
        header('Location: actualizar.php');
    //}
}else{
}
//$query=mysqli_query($con,$sql);

    //if($query){
       // Header("Location: productos.php");
    //}

?>