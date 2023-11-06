<section class="container">
    <br>
    <h2>REGISTRARSE COMO USUARIO</h2>
    <br>
    <?php $validation = \Config\Services::validation(); ?>
    <form method="post" action="<?php echo base_url('/enviar-form') ?>">
        <?= csrf_field(); ?>
        <?= csrf_field(); ?>
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif; ?>
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>
        
        <!-- <div class="card-body justify-content-center" media="(max-width:768px)">  -->
        <!--  <div class="form> -->


    
        <div class="mb-3">
            <label for="nombre">Nombres</label> 
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres">
        </div>

            <!-- Validación del campo -->
            <?php if ($validation->getError('nombre')) : ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('nombre') ?>
                </div>
            <?php endif; ?>



        <div class="mb-3">
        <label for="apellido">Apellidos</label> 
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos">
        </div>

            <!-- Validación del campo -->
            <?php if ($validation->getError('apellido')) : ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('apellido') ?>
                </div>
            <?php endif; ?>

        
        <div class="mb-3">
            <label for="email" class="form-label">Direccion de E-mail</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Direccion de correo electronico">
            <div id="emailHelp" class="form-text">No compartiremos tus datos con nadie</div>
        </div>
        <div class="mb-3">

            <!-- Validación del campo -->
            <?php if ($validation->getError('email')) : ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('email') ?>
                </div>
            <?php endif; ?>


        
        <label for="usuario">Usuario</label> 
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario elegido">
        </div>

            <!-- Validación del campo -->
            <?php if ($validation->getError('usuario')) : ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('usuario') ?>
                </div>
            <?php endif; ?>
        
        
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
        </div>


            <!-- Validación del campo -->
            <?php if ($validation->getError('pass')) : ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('pass') ?>
                </div>
            <?php endif; ?>

        <br>

        <button type="submit" value="Guardar" class="btn btn-primary">REGISTRARSE</button>
        <button type="reset" value="Cancelar" class="btn btn-primary">BORRAR TODO</button>
        <br><br>
        <br /><br />
    </form>

</section>