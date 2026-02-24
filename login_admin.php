<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Login Admin</title>
</head>
<body>

<?php $pageTitle = "Login ADMIN";
include 'navbar.php';
?>

<main>

<form action="validar_admin.php" method="POST">

Usuario:
<input type="text" name="usuario" required><br><br>

Contraseña:
<input type="password" name="password" required><br><br>

<button type="submit">Ingresar</button>

</form>
</main>

<?php include 'footer.php'; ?> 
</body>
</html>