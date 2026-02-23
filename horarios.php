<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$fecha = $_GET['fecha'];

$horarios = [
    "09:00",
    "10:00",
    "11:00",
    "12:00",
    "13:00",
    "16:00",
    "17:00"
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Hora</title>
</head>
<body>

<h2>Selecciona horario para <?php echo $fecha; ?></h2>

<?php foreach ($horarios as $hora): ?>

    <form action="guardar_citas.php" method="POST" style="margin-bottom:10px;">

        <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
        <input type="hidden" name="hora" value="<?php echo $hora; ?>">

        <button type="submit"><?php echo $hora; ?></button>

    </form>

<?php endforeach; ?>

</body>
</html>