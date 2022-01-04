<?php
     if (isset($_POST["acc"])) {
        require_once("conexion.php");
        $cnn = conexion();
         if ($_POST["acc"]=="eliminar") {
            $consulta = $cnn->query("DELETE FROM contacto WHERE (idContacto ='".$_POST["id"]."')");
            echo($cnn->query("DELETE FROM contacto WHERE (idContacto ='".$_POST["id"]."'"));
            if ($consulta) {
                echo("200");
            }else{
                echo("400");
            }
         }
     }
?>