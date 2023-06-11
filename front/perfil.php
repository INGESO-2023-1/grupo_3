<?php
    include("cabecera_perfil.php");
    session_start();
    if(!isset($_SESSION["user"])){
      header("location:login.php"); 
    }

    $userr = $_SESSION["user"];

    $sql = "select *from usuarios where user = '$userr'";
    $result = mysqli_query($conexion, $sql);
    $fil= mysqli_fetch_row($result);
    $_SESSION["number"] = $fil[2];

?>


<div  class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-9 col-lg-8 col-xl-6">
        <div id="fondo9" style="background-color: rgb(255,255,255);" class="card" style="border-radius: 10px;">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
                <img src="../images/user_image.webp"
                  alt="Generic placeholder image" class="img-fluid" 
                  width="200px">
              </div>
              <div class="flex-grow-1 ms-3">
                <div class="card-body">
                  <br><br>
                  <h3>User: <?php echo $_SESSION['user'];?></h3> 
                  <h3>Number: <?php echo $_SESSION['number'];?></h3>             
                </div>               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include("pie.php");?>