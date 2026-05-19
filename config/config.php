
<!--Ruta absoluta a raiz del Proyecto -->
 <?php

if (!defined('BASE_URL')) {
    define('BASE_URL', '/Proyecto_SW_GCM/');
}

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_SW_GCM/');
}


// variable para el boton de agendar cita en el inicio
$link_agendar = isset($_SESSION['usuario_id'])
    ? BASE_URL . 'paciente/citas.php'
    : BASE_URL . 'auth/login.php';
?>