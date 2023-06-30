
<?php 
    
    include("connection.php");
    session_start();

    if($_POST){

        $userr=$_POST["user"];
        $passs=$_POST["pass"];
        $_SESSION["user"]=$_POST["user"];

        $consulta = "SELECT * FROM usuarios WHERE user = '$userr' AND pass = '$passs'";
        $resultado = mysqli_query($conexion, $consulta);
        
        $fila= mysqli_fetch_row($resultado);
        $_SESSION["id_user"] = $fila[0];
        $conectionx = 1;

        if ($resultado->num_rows > 0) {
            // El usuario y la contraseña son válidos
            $sqll = "update usuarios set conection='$conectionx' where id_user='$fila[0]'";
            $resultado2 = mysqli_query($conexion, $sqll);

            if ($resultado2) {
                $_SESSION["conection"]=$conectionx;
                header("location:../front/pagina_mensajeria.php");
            }
            else {
                echo "Error al cambiar el estado de conexion: " . mysqli_error($conexion);
                header("location:../front/pagina_mensajeria.php");
            }

        } else {
            // El usuario y/o la contraseña no son válidos
            echo "El usuario $userr y/o su contraseña no son válidos.";
            header("location:../front/login.php");
        }
    }
?>