<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/popUpUpdateUsers.css" />
</head>

<body>
    <div class="container">
        <form class="form" action="../controller/ctr_updateUsers.php " method="POST">
            <label for="codigo">Codigo</label>
            <input type="text" id="codigo" name="codigo" style="text-align: center;" pattern="[0-9]+" required placeholder="Usuario registrado" />
            <label for="rol">Rol</label>
            <select id="rol" name="rol" name="rol">
                <option value="2">Coordinador</option>
                <option value="4">Nomina</option>
                <option value="3">Costos</option>
                <option value="1">Administrador</option>
            </select>
            <label for="zona">Zona</label>
            <select id="zona" name="zona">
                <option value="1">Administracion</option>
                <option value="2">Costos</option>
                <option value="3">Nomina</option>
                <option value="4">Santa Marta</option>
                <option value="5">Banacol Zungo</option>
                <option value="6">Colonia</option>
                <option value="7">Uniban Zungo</option>
                <option value="8">Operaciones Marinas</option>
                <option value="9">Uniban M3</option>
            </select>
            <button type="submit" class="enviar" name="enviar" id="enviar">Actualizar usuario</button>
        </form>
    </div>
</body>

</html>