<?php
    include("cabecera.php");
    include("../back/connection.php");

    if($_POST){
        session_start(); //Consulta Insert Usuarios
        $nombre=$_POST["user"];
        $numero=$_POST["number"];
        $contra=$_POST["pass"];
        $_SESSION["number"]=$numero;

        $sql = "insert into usuarios values(default,'$nombre', '$numero', '$contra')";
        mysqli_query($conexion, $sql);
        header("location:login.php");
    }

?>


<!doctype html>
    <html lang="en">
      <head>
        <title>Crear Cuenta</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS v5.2.0-beta1 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
      </head>
        
        <body>

            <div class="container">
                <div class="row">
                     <div class="col-md-4">
                        
                     </div>

                     <div class="col-md-4">

                        <div class="card">
                            <div class="card-header">
                                Crear cuenta
                            </div>

                            <div class="card-body">
                                <form action="crear_cuenta.php" method="post">

                                    <input class="form-control" type="text" name="user" placeholder="Nombre de usuario">
                                    <br/><br/>

                                    <input class="form-control" type="number" name="number" placeholder="Número">
                                    <br/><br/>

                                    <input class="form-control" type="password" name="pass" placeholder="Contraseña">
                                    <br/><br/>
                                    
                                    <button class="btn btn-outline-success" type="submit">Crear</button>
                                    <br/><br/>

                                </form>
                            </div>

                            <div class="card-footer text-muted">
                            </div>
                        </div>

                     </div>

                     <div class="col-md-4">
                        
                     </div>                    
                </div>
            </div>
      
        </body>

    </html>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include("pie.php");?>