<?php
class valRegister
{
    private $codigo;
    private $conexion;
    private $rol;
    private $zona;


    public function __construct($codigo, $conexion, $rol, $zona)
    {
        $this->codigo = $codigo;
        $this->conexion = $conexion->conMysql();
        $this->rol = $rol;
        $this->zona = $zona;
    }

    public function verificarCodigo()
    {
        if (!empty(($_POST["codigo"] && $_POST["rol"] && $_POST["zona"]))) {
            $verificar_codigo = $this->conexion->query("SELECT * FROM usuarios WHERE codigo = '$this->codigo'");

            if ($verificar_codigo->num_rows > 0) {
                echo '
                <script>
                    alert("Este Codigo ya Está Registrado, Inténtalo Nuevamente");
                    window.location = "../view/register.php";
                </script>';
                exit();
            }
        }
    }

    public function registrarCodigo()
    {
        if (!empty($_POST['codigo'])) {
            $query = "INSERT INTO usuarios(codigo, id_rol, id_zona) VALUES ('$this->codigo', '$this->rol', '$this->zona')";
            try {
                $ejecutar = mysqli_query($this->conexion, $query);
                if ($ejecutar) {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario Almacenado Exitosamente',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                            location.assign('../view/register.php');
                        });
                    });
                    </script>";
                } else {
                }
            } catch (Exception $e) {
                echo '  
                    <script>
                        alert("Usuario No Almacenado, Inténtalo de Nuevo");
                        window.location = "../view/register.php";
                        
                    </script>
                ';
                echo 'Error de MySQL: ' . mysqli_error($this->conexion);
            };
        } else {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Por favor rellene los campos',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 5000
                    }).then(() => {
                        location.assign('../view/register.php');
                    });
                });
                </script>";
        }
    }
}
