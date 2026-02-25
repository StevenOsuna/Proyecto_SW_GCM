<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login Paciente</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
      <link rel="stylesheet" href="../assets/style.css">
</head>

    <body>
      <?php $pageTitle = "Login";
      include '../estructura/navbar.php';
      ?>
    <main>

      <form action="../validar_login.php" method="POST">
        Email:
        <input type="email" name="email" required /><br /><br />

        Contraseña:
        <input type="password" name="password" required /><br /><br />

        <button type="submit">Ingresar</button>
      </form>
    
    </main>

    <?php include '../estructura/footer.php'; ?>
    </body>
  
</html>
