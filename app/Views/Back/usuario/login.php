<section class="container">
    <BR>
    <h2>USUARIOS REGISTRADOS</h2>
    <bR>

    <!-- Verifica si hay un mensaje de advertencia en la sesión -->
    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-warning">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>

    <!-- Inicia el formulario para acceder -->
    <form method="post" action="<?php echo base_url('/enviarlogin') ?>">
        <!-- Campo para ingresar la dirección de correo electrónico -->
        <div class="mb-3">
            <label for="email" class="form-label">Dirección de E-mail</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <!-- Texto de ayuda para el campo de correo electrónico -->
            <div id="emailHelp" class="form-text">No compartiremos tus datos con nadie</div>
        </div>

        <!-- Campo para ingresar la contraseña -->
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
        </div>

        <!-- Opción para recordar al usuario -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Recordarme</label>
        </div>

        <!-- Botones para enviar el formulario o borrar los campos -->
        <button type="submit" class="btn btn-primary">Ingresar</button>
        <button type="reset" class="btn btn-primary">Borrar</button>

        <!-- Enlace para registrarse si no se tiene una cuenta -->
        <br><span>¿No registrado? <a href="<?php echo base_url('/registro'); ?>">Registrarse aquí</a></span>
    </form>

    <br/><br/><br/>
</section>
