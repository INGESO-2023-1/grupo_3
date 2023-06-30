<?php
    include("../back/connection.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <title>System Messenger</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../images/top_image.jpg" />
  </head>
  
  <body id="fondo4">

<div class="container">
  <h5 id="titulo3" style="color:#FFFAFA" >System Messenger</h5>
    <a  id="perfil2" style="color:silver" href="perfil.php" ><img src="../images/user_image.webp" height="20px" widht="20" style="border-radius: 20px"><?php echo '  '.$_SESSION['user']; ?></a>
    <a id="perfilsesion" style="color:silver" href="../back/logout.php">Cerrar sesión</a>
    <hr style="color:white"><br> 
</div>

    
