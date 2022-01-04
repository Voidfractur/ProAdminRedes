<?php
require_once("conexion.php");
$cnn = conexion();
if ($cnn != null) {
    $consulta = $cnn->query("select * from contacto");
    $numeros = "";
    if ($consulta->num_rows > 0) {
        while ($ren = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $numeros .= "
            <div class='alert alert-primary' role='alert'>
            $ren[nombre] - $ren[Numero] - $ren[Email] - $ren[Etiqueta]
            <button type='button' onclick='deleteContacto($ren[idContacto])' class='btn btn-danger'>Borrar</button>
            </div>
            ";
        }
    } else {
        $numeros .= "
        <div class='alert alert-warning' role='alert'>
        Sin Contactos
        </div>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once("navbar.php");

    ?>
    <main>
        <div class="container">
            <?php
            echo ($numeros);
            ?>
        </div>
    </main>
    <script>
        function deleteContacto(id) {
            var datos = new FormData();
            var sol = new XMLHttpRequest();
            datos.append("acc", "eliminar");
            datos.append("id", id);
            console.log(id);
            sol.addEventListener(
                "load",
                function(e) {
                    if (e.target.responseText == "200") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        window.location.reload(); 
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'hubo un problema al borrar!'+e.target.responseText
                        })
                    }
                },
                false
            );
            console.log(id);
            sol.open("POST", "acciones.php", true);
            sol.send(datos);
        }
    </script>
    <script src="js/sweetalert.all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>