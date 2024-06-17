<?php

class updateUser
{
    private $codigo_user;
    private $rol;
    private $zona;
    private $conexion;

    public function __construct($codigo_user, $rol, $zona, $conexion)
    {
        $this->codigo_user = $codigo_user;
        $this->rol = $rol;
        $this->zona = $zona;
        $this->conexion = $conexion->conMysql();
    }

    public function verificarCodigo()
    {
        if (!empty(($_POST["codigo"] && $_POST["rol"] && $_POST["zona"]))) {
            $verificar_codigo = $this->conexion->query("SELECT * FROM usuarios WHERE codigo = '$this->codigo_user'");

            if ($verificar_codigo->num_rows < 1) {
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'No se encuentra registro',
                            showCancelButton: false,
                            confirmButtonColor: '#FF0000',
                            confirmButtonText: 'OK',
                            timer: 6000
                        }).then(() => {
                            location.assign('../view/users.php');
                        });
                    });
                    </script>";
                exit();
            }
        }
    }
    public function changeUsers()
    {
        if (!empty($_POST['codigo']) && !empty($_POST['rol']) && !empty($_POST['zona'])) {
            $query = "UPDATE usuarios SET id_rol = ?, id_zona = ? WHERE codigo = ?";

            if ($stmt = $this->conexion->prepare($query)) {
                $stmt->bind_param('iii', $this->rol, $this->zona, $this->codigo_user);

                if ($stmt->execute()) {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario actualizado con éxito',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                            location.assign('../view/users.php');
                        });
                    });
                    </script>";
                } else {
                    echo "Error al ejecutar la consulta: " . $stmt->error;
                }
            } else {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al preparar la consulta',
                        showCancelButton: false,
                        confirmButtonColor: '#FF5733',
                        confirmButtonText: 'OK',
                        timer: 5000
                    }).then(() => {
                        location.assign('../view/users.php');
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
                    title: 'Uno o más campos están vacíos',
                    showCancelButton: false,
                    confirmButtonColor: '#FF5733',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/users.php');
                });
            });
            </script>";
        }
    }
}
