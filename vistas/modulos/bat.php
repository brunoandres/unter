<?php
function send($cmd){

	popen($cmd,'r');

}

//RECIBO EL PATH DESDE LA BASE LA URL.
$path = $_GET['path'];

//DIRECTORIO DEL SISTEMA.
$directorio = 'proyecto_unter';

//FUNCION PARA EJECUTAR SCRIPT .BAT, LUEGO DE START ELEGIR DIRECTORIO DEL ARCHIVO.
send('start C:/xampp/htdocs/'.$directorio.'./bat_envios/'.$path.'.bat');
echo ("<script>location.href='grupos'</script>");


?>
