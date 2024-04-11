<?php
session_start();
class valLogin
{
    private $codigo;
    private $conexion;

    public function __construct($codigo, $conexion)
    {
        $this->codigo = $codigo;
        $this->conexion = $conexion->conMysql();
    }


    public function validarLogin()
    {
        if (!empty($_POST["codigo"])) {
            $login = $this->conexion->query("SELECT * FROM usuarios WHERE codigo = '$this->codigo'");
            if ($login->num_rows > 0) {
                $datos = $login->fetch_assoc();
                $rol = $datos["id_rol"];
                $codigo = $datos["codigo"];
                $zona = $datos["id_zona"];

                if ($this->codigo == $codigo) {
                    $_SESSION['rol'] = $rol;
                    $_SESSION['zona'] = $zona;
                    $_SESSION['id_usuario'] = $codigo;


                    echo '<script>window.location.href="../view/main.php";</script>';
                    exit();
                } else {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Usuario No Existe, Contraseña Incorrecta. Verifique Su Informacion',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                            location.assign('../view/login.php');
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
                            title: 'Usuario No Existe, Contraseña Incorrecta. Verifique Su Informacion',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                            location.assign('../view/login.php');
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
                    title: 'Por favor rellene los campos',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/login.php');
                });
            });
            </script>";
        }
    }
}
