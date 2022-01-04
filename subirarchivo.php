<?php

$ftp_server="3.138.190.248";
$ftp_usu="david";
$ftp_pass="david";
$con_id=ftp_connect($ftp_server);
$lr=ftp_login($con_id,$ftp_usu,$ftp_pass);
if ((!$con_id) || (!$lr)) {
    echo "no se pudo conectar";
    exit;
}else {
    echo "Conectado correctamente";
    $temp=explode(".",$_FILES['david/ftp/archivo']['name']);
    $source_file=$_FILES['david/ftp/archivo']['tmp_name'];
    $destino="archivos";
    $nombre=$_FILES["archivos"]['name'];
    $subio=ftp_put($con_id,
            $destino.'/'.$nombre,
            $source_file,
            FTP_BINARY);
    if ($subio) {
        echo "ARCHIVO SUBIDO CORRECTAMENTE";
    }else {
        echo "ERROR AL SUBIR EL ARCHIVO";   
    }
}
?>