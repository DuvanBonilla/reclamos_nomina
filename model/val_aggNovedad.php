    <?php

    class valNovedad
    {
        private $fechaRegistro;
        private $fechaNovedad;
        private $coordinador;
        private $semana;

        private $novedad;
        private $trabajador;
        private $descripcion;
        private $idServicio;
        private $idUsuario;
        private $estado;
        private $zonaEspecifica;
        private $id_zona;
        private $id_aprobacionC;
        private $id_aprobacionN;
        private $conexion;

        public function __construct($fechaRegistro, $fechaNovedad, $coordinador, $semana, $novedad, $trabajador, $descripcion, $idServicio, $idUsuario, $estado, $zonaEspecifica, $id_zona, $id_aprobacionC, $id_aprobacionN, $conexion)
        {
            $this->fechaRegistro = $fechaRegistro;
            $this->fechaNovedad = $fechaNovedad;
            $this->coordinador = $coordinador;
            $this->semana = $semana;
            $this->novedad = $novedad;
            $this->trabajador = $trabajador;
            $this->descripcion = $descripcion;
            $this->idServicio = $idServicio;
            $this->idUsuario = $idUsuario;
            $this->estado = $estado;
            $this->zonaEspecifica = $zonaEspecifica;
            $this->id_zona = $id_zona;
            $this->id_aprobacionC = $id_aprobacionC;
            $this->id_aprobacionN = $id_aprobacionN;
            $this->conexion = $conexion->conMysql();
        }


        public function registrarNovedad()
        {
            if (!empty($_POST['fechaRegistro'] && $_POST['fechaNovedad'] && $_POST['novedad'] && $_POST['coordinador'] &&  $_POST['semana'] && $_POST['idServicio'] && $_POST['descripcion'] && $_POST['zonaEspecifica'])) {
                $query = "INSERT INTO novedades_nomina(fecha_registro,fecha_novedad,nombre_coordinador,semana,tipo_novedad,trabajador,descripcion,id_servicio,id_usuario,id_estado,id_zona_especifica, id_zona, id_aprobacionC, id_aprobacionN) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";

                if ($stmt = $this->conexion->prepare($query)) {
                    $stmt->bind_param('sssssssssssiii', $this->fechaRegistro, $this->fechaNovedad, $this->coordinador, $this->semana, $this->novedad, $this->trabajador, $this->descripcion, $this->idServicio, $this->idUsuario, $this->estado, $this->zonaEspecifica, $this->id_zona, $this->id_aprobacionC, $this->id_aprobacionN);

                    if ($stmt->execute()) {
                        echo "
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script language='JavaScript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Novedad Almacenada Exitosamente',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK',
                                timer: 5000
                            }).then(() => {
                                location.assign('../view/main.php#contact');
                            });
                        });
                        </script>";
                    } else {
                        echo "Error al preparar la consulta: " . $this->conexion->error;
                    }
                } else {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'no entro al stmt',
                            showCancelButton: false,
                            confirmButtonColor: '#FF5733 ',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                            location.assign('../view/main.php');
                        });
                    });
                    </script>";
                }
            } else {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'esta vacio',
                        showCancelButton: false,
                        confirmButtonColor: '#FF5733 ',
                        confirmButtonText: 'OK',
                        timer: 5000
                    }).then(() => {
                        location.assign('../view/main.php');
                    });
                });
                </script>";
            }
        }


        function subirArchivo($archivo, $fechaRegistro, $conexion)
        {
            // consulta por el id de forma descendente, de manera que se obtiene el id del ultimo añadido,se asigna al archivo
            $sql = "SELECT id FROM novedades_nomina ORDER BY id DESC LIMIT 1";
            $resultado = $this->conexion->query($sql);
            // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
            if ($archivo == null) {
                $archivo = "no hay archivo";
            }
            // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
            if ($resultado !== false) {
                $fila = $resultado->fetch_assoc();
                $id = $fila['id'];
                $_SESSION['id_novedad'] = $id;
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                $nombreArchivo = $archivo['name'];
                $archivoTemporal = $archivo['tmp_name'];
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                $carpetaDestino = 'C:\\\xampp\\\\htdocs\\\reclamos_nomina\\\archivos\\\\';
                $rutaDestino = $carpetaDestino . $nombreArchivo;
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                if (move_uploaded_file($archivoTemporal, $rutaDestino)) {

                    $sql = "INSERT INTO archivos (id,fecha,nombre_archivo,archivo) VALUES ('$id', '$fechaRegistro','$nombreArchivo', '$rutaDestino')";
                    if ($this->conexion->query($sql)) {
                        return true; // Éxito
                    }
                } else {
                    echo "<script>console.log('salio mal al mover');</script>";
                }
                return false; // Error
            } else {
                echo "<script>console.log('salio mal con los datos');</script>";
            }
        }
    }
