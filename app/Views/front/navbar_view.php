<?php
// Obtener la sesión actual
$session = session();
// Obtener el nombre y el perfil del usuario desde la sesión
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');
?>

<!-- ARCHIVO NAVBAR -->
<!-- BARRA DE NAVEGACION BOOTSTRAP -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <!-- LOGO -->
    <a class="navbar-brand" href="<?php echo base_url('principal') ?>">
      <img class="img-fluid" src="assets/img/logo.png" alt="Relojeria industrial Talentos Digitales" width="90" />
    </a>

    <!-- Botón de alternancia para dispositivos móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenedor para elementos de menú -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- Elementos de menú comunes a todos los perfiles -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href='quienes_somos'>Quienes somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='acerca_de'>Acerca de</a>
        </li>
        

        <!-- Verificar si el usuario está logueado -->
        <?php if ($perfil): ?>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('/logout'); ?>">Cerrar Sesión</a>
        </li>


          <!-- ADMINISTRADOR -->
          <?php if ($perfil == 1): ?>
            <!-- Elementos de menú específicos para el perfil de administrador -->
            <!-- <div class="btn btn-secondary active btnUser btn-sm"> -->
              <a href="<?php echo base_url('/panel'); ?>">ADMINISTRADOR:
                <?php echo $nombre; ?>
              </a>
            <!-- </div> -->



            <!-- CLIENTE -->
          <?php elseif ($perfil == 2): ?>
            <!-- Elementos de menú específicos para el perfil de cliente -->
            <a href="<?php echo base_url('/panel'); ?>">USUARIO:
              <?php echo $nombre; ?>
            </a>


            <!-- Elementos de menú para usuarios logueados -->

            <li class="nav-item dropdown">

              <!-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                +info
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Productos</a></li>
                  <li><a class="dropdown-item" href="#">Servicio Técnico</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Libro de quejas</a></li>
                </ul>
                -->

            </li>
          <?php endif; ?>
        <?php else: ?>
          <!-- Elementos de menú para usuarios no logueados -->
          <li class="nav-item">
            <a class="nav-link" href='registro'>Registrarse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='login'>Login</a>
          </li>
        <?php endif; ?>
      </ul>

      <!-- Formulario de búsqueda -->
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="ejemplo: reloj pulsera" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
<!-- FIN BARRA NAVEGACION BOOTSTRAP -->