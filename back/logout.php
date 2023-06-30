<?php
    include("connection.php");
    include("loginback.php");
    
    $ID =$_SESSION["id_user"];
    $conectionxx = 0;
    $sqll = "update usuarios set conection='$conectionxx' where id_user='$ID'";
    $resultado2 = mysqli_query($conexion, $sqll);

    if ($resultado2) {
        $_SESSION["conection"]=0;
        session_start();
        session_destroy();
        header("location:../front/login.php");
    }
    else {
        echo "Error al cambiar el estado de conexion: " . mysqli_error($conexion);
        header("location:../front/pagina_mensajeria.php");
        }
?>
