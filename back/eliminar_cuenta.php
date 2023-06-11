<?php 
    include("connection.php");
    include("loginback.php");
    
    $ID =$_SESSION["id_user"];

    $consulta = "DELETE FROM usuarios WHERE id_user = '$ID'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        header("location:../front/crear_cuenta.php");
    } else {
        echo "Error al eliminar el usuario: " . mysqli_error($conexion);
    }
        
    
?>