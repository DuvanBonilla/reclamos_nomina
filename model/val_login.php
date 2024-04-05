<?php

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
                $codigo = $datos["codigo"];
                if ($this->codigo == $codigo) {
                    echo '<script>window.location.href="../view/form.php";</script>';
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
