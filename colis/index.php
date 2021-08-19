<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inposdom! | </title>
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script src="../js/jquery-1.2.6.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script type="text/javascript">
     document.oncontextmenu = function(){return false;}
    </script>
    <script type="text/javascript">
    $(document).ready(function()
    {
     $("#login_form input:first").focus();
     });
    </script>
  </head>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="entrada.php" method="post">
              <h1>Colis Postal</h2>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" name="nombre" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" name="pass" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" name="login" value="Entrar">
                <!--<a  href="index.html">Entrar</a>-->
                <a class="reset_pass" href="#" onmouseDown="alert('Ponte en Contacto con Fernando Burgos')" >Olvidaste tu Contrasena?</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1>Instituto Postal Dominicano</h1>
                  <p>©2016 Todos Los Derechos Reservador. Desarrollado por Innorious SRL</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <!--<div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>-->
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
