<?php
// Obtener la sesión actual
$session = session();
// Obtener el nombre y el perfil del usuario desde la sesión
$nombre = $session->get('nombre');
$apellido = $session->get('apellido');
$email = $session->get('email');
$perfil = $session->get('perfil_id');
?>
<div class="container mt-5">
    <div class="row justify-content-md-center align-items-start">
        <div class="col-5">
            <?php if (session()->getFlashdata('msg')): ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->perfil_id == '1'): ?>
                <div>
                    <h2>PANEL DE CONTROL - ADMINISTRADOR</h2>
                    <h4>
                        <?= $nombre ?>
                        <?= $apellido ?>
                    </h4>
                    <br>
                    <h6>
                        <?= $email ?>
                    </h6>


                    <img class="center" height="200px" width="200px" src="<?= base_url('assets/img/admin.png'); ?>">
                </div>
            <?php elseif (session()->perfil_id == '2'): ?>
                <div>
                    <h2>PANEL DE CONTROL - USUARIO</h2>
                    <h4>
                        <?= $nombre ?>
                        <?= $apellido ?>
                    </h4>
                    <br>
                    <h6>
                        <?= $email ?>
                    </h6>

                    <img class="center" height="200px" width="200px" src="<?= base_url('assets/img/cliente.png'); ?>">
                </div>
            <?php endif; ?>


            <br><br><br>

        </div>
    </div>
</div>