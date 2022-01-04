<?php
function conexion()
{
    $cnn = new mysqli("localhost", "root", '!#34aSfaÑ214!', "agenda");
    if (mysqli_connect_errno()) {
        exit();
        return null;
    } else {
        return $cnn;
    }
}
