<?php 
    include("connection.php");
    session_start();
    if($_POST){
        $userr=$_POST["user"];
        $passs=$_POST["pass"];
        $_SESSION["user"]=$_POST["user"];
        
        
        $sql = "select *from Usuario where nombre='$userr' and contraseña='$passs'";
        $obj = pg_query($conexion, $sql);

        $fila= pg_fetch_row($obj);
        $_SESSION["id"] = $fila[0];

        $filas =pg_num_rows($obj);

        if($filas>0){
            header("location:pagina_animes.php");
        }
        else{
            echo "Usuario o contraseña incorrecta. Intente Nuevamente";
            header("location:/../front/login.php");
        }

    }

?>