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
    $_SESSION["state"] = $fil[5];
?>


<div  class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-9 col-lg-8 col-xl-6">
        <div style="background-color: #757a6f" class="card" style="border-radius: 30px;">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="flex-shrink-0"><br><br>
                <img src="../images/user_image.webp"
                  alt="Generic placeholder image" class="img-fluid" 
                  width="150px">
              </div>
              <div class="flex-grow-1 ms-3">
                <div class="card-body">
                  <div class="containerr">
                    <div class="circle"></div>
                      <h4>En línea</h4>
                </div><br>
                  <a>User: <?php echo $_SESSION['user'];?></a> <br>
                  <a>Number: <?php echo $_SESSION['number'];?></a> <br>
                  <a>Info: <?php echo $_SESSION['state'];?></a> <br> <br><br>        
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