<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/editNovedad.css" />

</head>

<body>
    <div class="container">
        <form class="form" action="../controller/ctr_editNovedad.php" method="POST">
            <label for="Novedad">Novedad</label>
            <input type="text" name="novedad" id="novedad"  style="text-align: center;" required />

            <label for="Trabajador">Trabajador</label>
            <input type="text" name="trabajador" id="trabajador"  style="text-align: center;" required />

            <label for="IdServicio">ID servicio</label>
            <input type="text" name="idservicio" id="idservicio"  style="text-align: center;" required /> 

            <label for="Trabajador">Trabajador</label>
            <input type="text" name="trabajador" id="trabajador"  style="text-align: center;" required />
            
            <label for="codigo">Id servicio</label>
            <input type="text" name="idServicio" id="idServicio"  style="text-align: center;" required />

            <label for="ZonaEspecifica">Zona Especifica</label>
            <input type="text" name="zonaespecifica" id="zonaespecifica"  style="text-align: center;" required />

            <br>
            <div class="field">
                <label for="descripcion">Nueva descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" required></textarea>
            </div>
            <button type="submit" class="enviar" name="enviar" id="enviar">Actualizar usuario</button>
        </form>
    </div>
</body>

</html>