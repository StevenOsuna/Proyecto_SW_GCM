<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../auth/login_admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zona Administrativa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">

    <style>
        /* Fondo distinto para admin */
        body {
            background: linear-gradient(135deg, #f0f7ff, #e6f0ff);
        }

        /* Panel estilo dashboard */
        .admin-card {
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 123, 255, 0.15);
            transition: all 0.4s ease;
            animation: fadeInUp 0.6s ease forwards;
        }

        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 123, 255, 0.2);
        }

        /* Título privado */
        .admin-title {
            color: #0056b3;
            font-weight: 800;
        }

        /* Animación */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Badge zona privada */
        .zona-privada {
            background-color: #dc3545;
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>

<?php include '../estructura/navbar.php'; ?>

<main class="container py-5">