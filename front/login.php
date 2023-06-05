<?php include("cabecera.php");?>
    <!doctype html>
    <html lang="en">
      <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS v5.2.0-beta1 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
      </head>
        
        <body id="fondo3">
        

            <div class="container">
                <div class="row">
                     <div class="col-md-4">
                        
                     </div>

                     <div class="col-md-4">

                        <div class="card">
                            <div class="card-header">
                                Ingreso de Usuario
                            </div>

                            <div class="card-body">
                                <form action="/../loginback.php" method="post">

                                    <input class="form-control" type="text" name="user" placeholder="Nombre de usuario">
                                    <br/><br/>

                                    <input class="form-control" type="number" name="pass" placeholder="Numero">
                                    <br/><br/>                                                     

                                    <button class="btn btn-outline-primary" type="submit">Iniciar</button>
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
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include("pie.php");?>