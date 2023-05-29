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
    <link rel="icon" href="assets/logo/logo.png" type="logo" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/medias.css" />
    <link rel="stylesheet" type="text/css" href="css/timeline.css" />
    <link rel="stylesheet" type="text/css" href="css/aos.css" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
    />
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <title>Club Atlético Correa</title>
  </head>
  <body id="header">
    <header>
      <div class="container-navbar">
        <div>
          <img class="nav-logo" src="assets/logo/logo.png" alt="" />
        </div>

        <nav id="nav">
          <ul class="nav-list">
            <li class="nav-link"><a href="#header">Inicio</a></li>
            <li class="nav-link"><a href="#history">Historia</a></li>
            <li class="nav-link"><a href="#institution">Institución</a></li>
            <li class="nav-link"><a href="#discipline">Deportes</a></li>
            <li class="nav-link"><a href="#contact">Contacto</a></li>
          </ul>
          <a class="nav-button" href="pages/ingreso.php">Ingresar</a>
        </nav>

        <div class="nav-toggle">|||</div>
      </div>
    </header>
    <main>
      <img class="repair" src="assets/img/repair.png" alt="" />


      <!-- Institution -->


      <!-- Disciplines Info -->

      <!-- Disciplines Info -->

      <!-- Contact -->

      <section id="contact">
        <form>
          <div class="label">
            <label for="name"><i class="fas fa-user-alt"></i></label>
            <input type="text" id="name" name="name" placeholder="Nombre" required />
          </div>

          <div class="label">
            <label
              for="surname"
            ><i class="fas fa-user-alt"></i></label>
            <input type="text" id="surname" name="surname" placeholder="Apellido" required />
          </div>

          <div class="label">
            <label
              for="email"
            ><i class="fas fa-envelope"></i></label>
            <input type="email" id="email" name="email" placeholder="Email" required />
          </div>

          <div class="label">
            <label
              for="phone"
            ><i class="fas fa-phone"></i></label>
            <input type="number" id="phone" name="phone" placeholder="Teléfono" required />
          </div>

          <div>
            <textarea
              name="textarea"
              id="textarea"
              placeholder="Su mensaje"
              required
            ></textarea>
          </div>

          <div>
            <button type="submit">Enviar</button>
          </div>
        </form>
        <article class="contact">
          <div class="sede">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1369.1825884442023!2d-61.25452996522779!3d-32.847751711447756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b626bdd71669d9%3A0x4b8d2092e89d5add!2sRestaurante%20Sede%20CLUB%20ATLETICO%20CORREA!5e0!3m2!1ses!2sar!4v1667663879927!5m2!1ses!2sar"
              width="600"
              height="450"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
            <div class="address">
              <h4>Sede Club Atlético Correa</h4>
              <p>
                <i class="fa-sharp fa-solid fa-house-chimney-window"></i
                >25 de Mayo 550, Correa, Santa Fe, Argentina
              </p>
              <p>
                <a href="https://wa.me/+5493471..." target="_blank"
                  ><i class="fab fa-whatsapp"></i>03471-15...</a
                >
              </p>
              <p>
                <a href="tel:03471..." target="_blank"
                  ><i class="fas fa-phone"></i>03471-...</a
                >
              </p>
            </div>
          </div>
          <div class="complejo">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2302.493360341959!2d-61.253149823941705!3d-32.85500021607486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b627575d88525f%3A0x26e5afb9e8b7ba!2sClub%20Atl%C3%A9tico%20Correa!5e0!3m2!1ses!2sar!4v1667663915020!5m2!1ses!2sar"
              width="600"
              height="450"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
            <div class="address">
              <h4>Complejo deportivo</h4>
              <p>
                <i class="fa-sharp fa-solid fa-house-chimney-window"></i
                >Juan Manuel de Rosas y Moreno, Correa, Santa Fe, Argentina
              </p>
              <p>
                <a href="https://wa.me/+5493471..." target="_blank"
                  ><i class="fab fa-whatsapp"></i>03471-...</a
                >
              </p>
              <p>
                <a href=tel:03471..." target="_blank"
                  ><i class="fas fa-phone"></i>03471-...</a
                >
              </p>
            </div>
          </div>
        </article>
      </section>
    </main>

    <!-- Float Buttons -->

    <div id="whatsapp" class="btnWsp">
      <a href="https://wa.me/+5493471..." class="btn-wsp" target="_blank">
        <i class="icon-whatsapp"></i>
        <img
          src="assets/icons/whatsapp.png"
          style="width: 3rem"
          alt="logowsp"
        />
      </a>
    </div>

    <div id="up" class="up">
      <a href="#header">
        <i class="fas fa-arrow-circle-up"></i>
      </a>
    </div>

    <!-- Float Buttons -->



    <!-- Footer -->
    <footer class="text-center text-lg-start bg-white text-muted">
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

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <script type="text/javascript" src="js/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>



