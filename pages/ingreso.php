<?php
session_start();
            
$_SESSION['acceso']=0;

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0"
    />
    <link rel="icon" href="../assets/logo/logo.png" type="logo" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/medias.css" />
    <link rel="stylesheet" type="text/css" href="../css/timeline.css" />
    <link rel="stylesheet" type="text/css" href="../css/aos.css" />
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <title>Ingresar al Sistema de gestión</title>
  </head>
  <body>
    <header>
      <div class="container-navbar">
        <div>
          <img class="nav-logo" src="../assets/logo/logo.png" alt="logo-CAC" />
        </div>

        <nav id="nav">
          <ul class="nav-list">
            <li class="nav-link"><a href="../index.php#header">Inicio</a></li>
            <li class="nav-link">
              <a href="../index.php#history">Historia</a>
            </li>
            <li class="nav-link">
              <a href="../index.php#institution">Institución</a>
            </li>
            <li class="nav-link">
              <a href="../index.php#discipline">Deportes</a>
            </li>
            <li class="nav-link">
              <a href="../index.php#contact">Contacto</a>
            </li>
          </ul>
          <!-- <a class="nav-button" href="pages/ingreso.html">Ingresar</a> -->
        </nav>

        <div class="nav-toggle">|||</div>
      </div>
    </header>
    <main>
      <div class="form col-lg-6 col-md-12 mb-4 col-12 text-center">
        <form method="POST" action="../php/ingreso.php">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input
              type="text"
              id="form2Example1"
              name="user"
              class="form-control"
            />
            <label class="form-label" for="form2Example1">Usuario</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input
              type="password"
              id="form2Example2"
              name="pass"
              class="form-control"
            />
            <label class="form-label" for="form2Example2">Contraseña</label>
          </div>

          <!-- Submit button -->
          <!-- <button type="submit" class="btn btn-primary btn-block mb-4">
          Iniciar Sesión
        </button> -->

          <button class="ingreso2" type="submit">Iniciar Sesión</button>
        </form>
      </div>
    </main>

    <!-- Footer -->
    <footer
      class="text-center text-lg-start bg-white text-muted"
      style="position: fixed; bottom: 0; left: 0; width: 100%"
    >
      <!-- Section: Social media -->
      <section
        class="d-flex justify-content-center justify-content-lg-around p-3 border-bottom"
      >
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
          <h3 class="text-white">Club Atlético Correa</h3>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="social-media text-center">
          <a
            href="https://www.facebook.com/ClubAtleticoCorrea/"
            target="_blank"
            class="me-4 link-secondary"
          >
            <i class="fab fa-facebook-f"></i>
          </a>
          <a
            href="https://twitter.com/Club_A_Correa"
            target="_blank"
            class="me-4 link-secondary"
          >
            <i class="fab fa-twitter"></i>
          </a>
          <a
            href="https://www.instagram.com/clubatleticocorrea/?hl=es"
            target="_blank"
            class="me-4 link-secondary"
          >
            <i class="fab fa-instagram"></i>
          </a>
          <a href="mailto:.." target="_blank" class="me-4 link-secondary">
            <i class="fas fa-envelope"></i>
          </a>
          <a href="tel:03471" target="_blank" class="me-4 link-secondary">
            <i class="fas fa-phone"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Copyright -->
      <div class="text-center text-white p-3">
        © 2022 Copyright:
        <b
          ><a
            class="text-white"
            target="_blank"
            href="https://www.mgsolutions.com.ar"
            >MG Solutions</a
          ></b
        >
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
