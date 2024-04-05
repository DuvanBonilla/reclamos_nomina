<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="img/logo.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <div class="login-box">
    <img src="images/logo2.png" class="avatar" alt="Avatar Image" />

    <!-- form -->
    <form class="form" action="../controller/ctr_login.php" method="POST">
      <label for="codigo">Codigo</label>
      <input type="text" id="codigo" name="codigo" placeholder="ingrese codigo" />
      <button type="submit" class="enviar" name="enviar" id="enviar">Iniciar Sesión</button>
    </form>
    <!-- form -->
  </div>
</body>

</html>