<?php
require_once("conexion.php");
$cnn = conexion();
$alert = "";
if ($cnn != null) {
    if (isset($_POST["nuevocontacto"])) {
        $cnn = conexion();
        $consulta = $cnn->query("INSERT INTO contacto (`nombre`, `Numero`, `Email`, `Etiqueta`) VALUES ('" .$_POST["nombre"]."', '" .$_POST["numero"]."','" . $_POST["email"]."','" . $_POST["etiqueta"]."');
    ");
        echo ($consulta);
        if ($consulta) {
            header('Location: ' . "../index.php");
        } else {
        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>No se pudo guardar el contacto.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once("navbar.php");

    ?>
    <div class="container">
        <form class="row g-3" method="POST" action="">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-md-6">
                <label for="numero" class="form-label">Numero</label>
                <input type="number" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <label for="etiqueta" class="form-label">Etiqueta</label>
                <input type="text" class="form-control" id="etiqueta" placeholder="Compañero, Trabajo, Escuela" name="etiqueta" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="nuevocontacto">Agregar</button>
            </div>
        </form>
        <?php
             echo($alert);
        ?>
    </div>
    <script src="js/sweetalert.all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>