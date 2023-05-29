<?php
session_start();
            
if($_SESSION['acceso']==1){

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
    <title>Administracion</title>
  </head>
  <body id="header">
    <header>
      <div class="container-navbar">
        <div>
          <img width="90" src="../assets/logo/logo.png" alt="logo-CAC" />
        </div>

        <nav id="nav">
          <ul class="nav-list">
            <li class="nav-link"><a href="nuevosocio.php">Cargar Socio</a></li>
            <li class="nav-link">
              <a href="listasocios.php">Listado de Socios</a>
            </li>
            <li class="nav-link">
              <a href="profe1.php">Asistencias</a>
            </li>
            <li class="nav-link">
              <a href="baja.php">Editar / Eliminar</a>
            </li>
            <li class="nav-link">
              <a href="pago.php">Pago</a>
            </li>
            <li class="nav-link">
              <a href="valores.php">Valores</a>
            </li>
            <li class="nav-link">
              <a href="movimientos.php">Movimientos</a>
            </li>
            <li class="nav-link">
              <a href="balance.php">Balance</a>
            </li>
          </ul>
          <!-- <a class="nav-button" href="pages/ingreso.html">Ingresar</a> -->
          <a class="nav-button" href="../index.php">Salir</a>
        </nav>

        <div class="nav-toggle">|||</div>
      </div>
    </header>

    <main>
    <div class="text-admin">
        <div class="col-lg-12 col-md-12 mb-4 col-12 text-center">
          <img src="../assets/logo/logo.png" width="200" alt="" />
        </div>
        <div class="headline">
          <div class="text-center">
            <h2 id="text-typed"
              >Bienvenidos al sistema de gestión del C.A.C.</h2
            >
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-white text-muted"
    style="position: fixed; bottom: 0; left: 0; width: 100%;">
      <!-- Section: Social media -->
      <section
        class="d-flex justify-content-center justify-content-lg-around p-3 border-bottom"
      ></section>
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

    <script>
      /*-------- Effect TypeWriter ----------*/
        let text = document.getElementById("text-typed");
        let str = text.innerHTML;

        text.innerHTML = "";

        // let speed = 150;
        let i = 0;

        setInterval(() => {
          text.innerHTML += str.charAt(i);
          i++;
        }, 175);
      /*-------- Effect TypeWriter ----------*/

    </script>
    <script src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
<?php
}else{
  header("location: ingreso.php");
}

?>
