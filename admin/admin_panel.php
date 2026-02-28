<?php include 'layout_admin.php'; ?>

<div class="text-center mb-5">
    <span class="zona-privada">ZONA PRIVADA</span>
    <h2 class="admin-title mt-3">
        Bienvenido Administrador <?php echo $_SESSION['admin_usuario']; ?>
    </h2>
    <p class="text-muted">Gestión interna del consultorio médico</p>
</div>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card admin-card p-4 text-center">
            <i class="bi bi-calendar-check fs-1 text-primary mb-3"></i>
            <h5>Ver Citas</h5>
            <a href="admin_citas.php" class="btn btn-primary mt-3">Entrar</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card admin-card p-4 text-center">
            <i class="bi bi-calendar3 fs-1 text-primary mb-3"></i>
            <h5>Calendario</h5>
            <a href="admin_calendario.php" class="btn btn-primary mt-3">Entrar</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card admin-card p-4 text-center">
            <i class="bi bi-clock fs-1 text-primary mb-3"></i>
            <h5>Configurar Horarios</h5>
            <a href="admin_horarios.php" class="btn btn-primary mt-3">Entrar</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card admin-card p-4 text-center">
            <i class="bi bi-box-arrow-right fs-1 text-danger mb-3"></i>
            <h5>Cerrar Sesión</h5>
            <a href="../config/logout_admin.php" class="btn btn-outline-danger mt-3">Salir</a>
        </div>
    </div>

</div>

</main>
<?php include '../estructura/footer.php'; ?>
</body>
</html>