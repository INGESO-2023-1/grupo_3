<?php 
    include("../back/connection.php");
    include("../back/loginback.php");
    
    if($_GET){
        $New_name = $_GET["user"];
        $New_info = $_GET["info"];
        $IDd = $_SESSION["id_user"];
        $sqll = "update usuarios set user='$New_name', state='$New_info' where id_user='$IDd'";
        $resultado = mysqli_query($conexion, $sqll);

        if ($resultado) {
          $_SESSION["user"] = $New_name;
          $_SESSION["state"] = $New_info;
          header("location:perfil.php");

      } else {
          echo "Error al cambiar el usuario: " . mysqli_error($conexion);
      }
      
    } 
?>


<!DOCTYPE html>
<html>
<head>
<title>System Messenger</title>
<link rel="stylesheet" href="stylee.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
<link rel="shortcut icon" href="../images/top_image.jpg" />
</head>

<body id="fondo8">

<div class="container">
<h5 id="titulo3" style="color:#FFFAFA" >System Messenger</h5>
<a id="perfil" style="color:silver" href="pagina_mensajeria.php">Inicio</a>
<a id="perfil" style="color:silver" href="perfil.php">Perfil</a>
<a id="perfilsesion" style="color:silver" href="../back/logout.php">Cerrar sesión</a>
<hr style="color:white"><br> 
</div>

</div>
<section id="fondo11" class="vh-100" style="background-color: #757a6f">
  <div  class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-9 col-lg-8 col-xl-6">
        <div style="background-color: #757a6f;" class="card" style="border-radius: 30px;">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
                <img src="../images/user_image.webp"
                  alt="Generic placeholder image" class="img-fluid" 
                  width="300px">
              </div>
              <div class="flex-grow-1 ms-3">
                <div class="card-body">
                                <form action="perfil_editar.php" method="get">

                                    <input class="form-control" type="text" name="user" placeholder="Nuevo nombre">
                                    <br/><br/>

                                    <input class="form-control" type="text" name="info" placeholder="Nuevo estado">
                                    <br/><br/>
                                    
                                    <button id="perfilll" type="submit">Cambiar</button> <br/><br/><a id="perfillll" href="../back/eliminar_cuenta.php">Eliminar cuenta</a>
                                    <br/><br/>

                                </form>
                                
                            </div>               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include("pie.php");?>
