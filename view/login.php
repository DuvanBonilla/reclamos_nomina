<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="images/logo.ico.ico" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="css/login.css" />
  <title>Login</title>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-in">
      <form class="form" action="../controller/ctr_login.php" method="POST">
        <h1>Inicio de sesion</h1>
        <div class="social-icons">
          <img class="logoRegis" src="images/logo.ico.ico" alt="">

        </div>
        <span class="txt1">Ingrese su codigo</span>
        <input type="text" id="codigo" name="codigo" placeholder="codigo" />
        <button type="submit" class="enviar" name="enviar" id="enviar">
          Iniciar Sesión
        </button>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-right">
          <h1>Bienvenido</h1>
          <p>
            ¡Aquí puedes presentar todas las novedades! Tu participación es clave para avanzar juntos.
        </div>
      </div>
    </div>
  </div>
</body>

</html>