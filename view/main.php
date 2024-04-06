<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Dimension by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="css/main.css" />
    <noscript>
        <link rel="stylesheet" href="css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <div class="logo">
                <span class="icon fa-gem">
                    <img class="logo" src="images/logo-redondo.ico" alt="">
                </span>
            </div>
            <div class="content">
                <div class="inner">
                    <h1>Dimension</h1>
                    <p>A fully responsive site template designed by <a href="https://html5up.net">HTML5 UP</a> and released<br />
                        for free under the <a href="https://html5up.net/license">Creative Commons</a> </p>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#contact">Añadir novedad</a></li>
                    <li><a href="#work">Consultar</a></li>
                    <!-- <li><a href="#about">About</a></li> -->
                    <li><a href="register.php">Registrar usuario</a></li>
                    <!-- <li><a href="#elements">Elements</a></li> -->
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <div id="main">
            <!-- Work -->
            <article id="work">
                <h2 class="major">Work</h2>
                <span class="image main"><img src="images/pic02.jpg" alt="" /></span>
                <p>Adipiscing magna sed dolor elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices.</p>
                <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet feugiat tempus.</p>
            </article>

            <!-- Contact -->
            <article id="contact">
                <h2 class="major">Contact</h2>
                <form method="POST" action="#">
                    <div class="fields">
                        <div class="field half">
                            <label name="fechaRegistro" for="fechaRegistro">Fecha registro</label>
                            <input type="date" name="fechaRegistro" id="fechaRegistro" style="color: black;" />
                        </div>

                        <div class="field half">
                            <label name="fechaNovedad" for="Fecha novedad">Fecha novedad</label>
                            <input type="date" name="date" id="date" style="color: black;" />
                        </div>
                        <div class="field">
                            <label name="novedad" for="novedad">Novedad</label>
                            <select id="novedad" name="Novedad">
                                <option value="saldo faltante">Saldo faltante</option>
                                <option value="Saldo sobrante">Saldo sobrante</option>
                            </select>
                        </div>
                        <div class="field ">
                            <label name="cliente" for="cliente">Cliente</label>
                            <select id="cliente" name="cliente">
                                <option value="uniban">Uniban</option>
                                <option value="zungo">Zungo</option>
                                <option value="colonia">Colonia</option>
                            </select>
                        </div>
                        <div class="field half">
                            <label for="coordinador">Coordinador</label>
                            <input type="text" name="coordinador" id="coordinador" />
                        </div>
                        <div class="field half">
                            <label for="trabajador">Trabajador</label>
                            <input type="text" name="trabajador" id="trabajador" />
                        </div>
                        <div class="field half">
                            <label for="idServicio">Id servicio</label>
                            <input type="text" name="idServicio" id="idServicio" />
                        </div>
                        <div class="field ">
                            <label for="message">Descripcion</label>
                            <textarea name="message" id="message" rows="4"></textarea>
                        </div>
                    </div>
                    <button class="primary" type="submit" class="enviar" name="enviar" id="enviar">Registrar novedad</button>
                </form>
            </article>
        </div>
        <!-- Footer -->
        <footer id="footer">
            <p class="copyright"><a href=""></a></p>
        </footer>
    </div>
    <!-- Background -->
    <div id="bg"></div>
    <!-- Scripts -->
    <script src="../controller/js/jquery.min.js"></script>
    <script src="../controller/js/browser.min.js"></script>
    <script src="../controller/js/breakpoints.min.js"></script>
    <script src="../controller/js/util.js"></script>
    <script src="../controller/js/main.js"></script>
</body>

</html>