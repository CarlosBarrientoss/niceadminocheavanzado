  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Panel de control</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Panel de control</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <?php
          if (session_status() !== PHP_SESSION_ACTIVE) {
              session_start();
          }
echo '<pre>';
var_dump($_POST);
echo '</pre>';
          // 1. Lógica para controlar acciones (guardar usuario, verificar login, etc.)
          if (isset($_GET["route"]) && isset($_GET["action"])) {

              // Acción: guardar usuario
              if ($_GET["route"] === "users" && $_GET["action"] === "save") {
                  require_once "app/controladores/user.controller.php";
                  $controller = new UserController();
                  $controller->ctrUserSave();
              }

              // Acción: verificar login
              if ($_GET["route"] === "login" && $_GET["action"] === "verify") {
                  require_once "app/controladores/login.controller.php";
                  $controller = new LoginController();
                  $controller->ctrVerifyUser();
              }
          }

          // 2. Lógica para mostrar vistas
          if (isset($_GET["route"])) {
              $allowedRoutes = ["home", "users", "exit", "login"];
              if (in_array($_GET["route"], $allowedRoutes)) {
                  include "app/vistas/modulos/".$_GET["route"].".php";
              } else {
                  include "app/vistas/modulos/404.php";
              }
          } else {
              include "app/vistas/modulos/home.php";
          }
        ?>

      </div>
    </section>

  </main>