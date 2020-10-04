<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Inicio de Sesion</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
</head>
<body>

 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" ><img src="../imagenes/pug.jpg"></div><!--imagen-->
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido a <b>QUICK INVENTORIES</b></h1>
                  </div>
                  <form action="neg_evaluar_sesion.php" id="login" name="login" method="post" autocomplete="off"><!--- formulario para evaluar sesion-->
                    <div>
                         <?php
                        @$error=$_GET["error"];// cuando se ingresan mal los datos vote un mensaje de error
                        if ($error=="error")
                        {

                            echo "<p style='color:red'>Error en los datos de acceso</p>";
                        } ?>
                    </div>
                    <div class="form-group">
                      <input type="text" name="documento" class="form-control form-control-user" id="documento" placeholder="Documento...">
                    </div> 
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Contrasena">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Recuerdame</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block">
                       Iniciar Sesion
                    </button>
                    </form><!--Fin del formulario de inicio de sesion-->
                    <hr>
                   
                    <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">¿Olvido su contraseña?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Crear cuenta</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

<!-- Las casillas del formulario  -->
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->



</body>
</html> 