<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">

    <title>Panel Paciente</title>
</head>
<body>

<?php 
$pageTitle = htmlspecialchars($_SESSION['usuario_nombre'], ENT_QUOTES, 'UTF-8');
include 'estructura/navbar.php';
?>

<main>
<h2>Bienvenido </h2>

<p>Panel de paciente</p>

<!-- BOTÓN PARA AGENDAR CITA -->
<a href="../citas.php">Agendar Cita</a>


</main>

<!--Footer -->
<?php include 'estructura/footer.php'; ?> 

</body>
</html>