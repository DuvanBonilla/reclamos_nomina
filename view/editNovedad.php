<?php
session_start();
include("../model/val_editNovedad.php");

$zona = $_SESSION['zona'];
// Verificar si se ha hecho una solicitud AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && isset($_POST['novedad']) && isset($_POST['trabajador']) && isset($_POST['descripcion'])) {
        $id = $_POST['id'];
        $novedad = $_POST['novedad'];
        $trabajador = $_POST['trabajador'];
        $descripcion = $_POST['descripcion'];
        $id_servicio = $_POST['id_servicio'];
        $id_zona_especifica= $_POST['id_zona_especifica'];
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
            <label for="Id">Id</label>
            <input type="text" name="id" id="id" style="text-align: center;" required readonly value="<?php echo htmlspecialchars($id ?? 'no se encontraron datos'); ?>" />
            
            <div class="field">
            <label for="novedad"><strong>Novedad</strong></label>
            <select id="novedad" name="novedad" required>
                <option value="saldo faltante" <?php echo ($novedad === 'saldo faltante') ? 'selected' : ''; ?>>Saldo faltante</option>
                <option value="Saldo sobrante" <?php echo ($novedad === 'Saldo sobrante') ? 'selected' : ''; ?>>Saldo sobrante</option>
            </select>
                </div>
                    <label for="Trabajador">Trabajador</label>
                    <input type="text" name="trabajador" id="trabajador" style="text-align: center;" required value="<?php echo htmlspecialchars($trabajador ?? 'no se encontraron datos'); ?>" />

                    <label for="IdServicio">ID servicio</label>
                    <input type="text" name="idservicio" id="idservicio" style="text-align: center;" required value="<?php echo htmlspecialchars($id_servicio ?? 'no se encontraron datos'); ?>" /> 

                    <div class="field">
            <label for="ZonaEspecifica"><strong>Zona Especifica</strong></label>
            <select id="zonaespecifica" name="zonaespecifica" required>
                <?php
                $opcionesPorZona = [
                    1 => ["Patio Smitco", "Patio Satelite", "SPSM buque", "Cuarto Frio", "Lavado De Contenedores", "Smitco csf", "Banacol Zungo", "Banacol N1", "Banacol N2", "Uniban Colonia", "Muelle 2", "Patio Contenedores", "Zona Aduanera", "Carton Uniban", "Operaciones Marinas", "Uniban M3"],
                    2 => ["Patio Smitco", "Patio Satelite", "SPSM buque", "Cuarto Frio", "Lavado De Contenedores", "Smitco csf", "Banacol Zungo", "Banacol N1", "Banacol N2", "Uniban Colonia", "Muelle 2", "Patio Contenedores", "Zona Aduanera", "Carton Uniban", "Operaciones Marinas", "Uniban M3"],
                    3 => ["Patio Smitco", "Patio Satelite", "SPSM buque", "Cuarto Frio", "Lavado De Contenedores", "Smitco csf", "Banacol Zungo", "Banacol N1", "Banacol N2", "Uniban Colonia", "Muelle 2", "Patio Contenedores", "Zona Aduanera", "Carton Uniban", "Operaciones Marinas", "Uniban M3"],
                    4 => ["Patio Smitco", "Patio Satelite", "SPSM buque", "Cuarto Frio", "Lavado De Contenedores", "Smitco csf"],
                    5 => ["Banacol Zungo"],
                    6 => ["Banacol N1", "Banacol N2", "Uniban Colonia"],
                    7 => ["Muelle 2", "Patio Contenedores", "Zona Aduanera", "Carton Uniban"],
                    8 => ["Operaciones Marinas"],
                    9 => ["Uniban M3"]
                ];

                if (isset($opcionesPorZona[$zona])) {
                    $opciones = $opcionesPorZona[$zona];
                    foreach ($opciones as $opcion) {
                        // Compara el valor actual con el id_zona_especifica y selecciona si coinciden
                        $selected = ($opcion == $id_zona_especifica) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($opcion, ENT_QUOTES, 'UTF-8') . '" ' . $selected . '>' . htmlspecialchars($opcion, ENT_QUOTES, 'UTF-8') . '</option>';
                    }
                } else {
                    echo "No hay opciones para la zona " . htmlspecialchars($zona, ENT_QUOTES, 'UTF-8'); // Debugging
                }
                ?>
            </select>
        </div>
                    <div class="field">
                        <label for="descripcion">Nueva descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="10" required><?php echo htmlspecialchars($descripcion ?? 'no se encontraron datos'); ?></textarea>
                        </div>
                    <button type="submit" class="enviar" name="enviar" id="enviar">Actualizar usuario</button>
                </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="../controller/js/captureIdNovedad.js"></script>
</body>
</html>
<?php
    } else {
        // Responder con un mensaje de error en formato JSON
        echo json_encode([
            'success' => false,
            'message' => 'Datos no enviados correctamente'
        ]);
    }
    exit; // Salir para evitar que se envíe HTML adicional
}

?>
