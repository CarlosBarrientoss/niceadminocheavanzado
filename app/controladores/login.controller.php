<?php

require_once "app/modelos/login.model.php";

class LoginController {

    public static function ctrVerifyUser() {

            echo '<pre>';
    var_dump($_SERVER["REQUEST_METHOD"]);
    var_dump($_POST);
    var_dump($_GET);
    echo '</pre>';
    exit;

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"], $_POST["password"])) {

            $email = trim($_POST["email"]);
            $password = $_POST["password"];

            $response = LoginModel::mdlVerifyUser($email);
                echo '<pre>';
                var_dump($response);
                echo '</pre>';
                exit;

        //    if ($response && password_verify($password, $response["user_password"])) {
              if ($response && $password === $response["user_password"]) {

                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }

                $_SESSION["authenticated"] = "ok";
                $_SESSION["user_name"] = $response["user_name"];

                header("Location: index.php");
                exit;

            } else {
                echo '<div class="alert alert-danger text-center">Credenciales incorrectas</div>';
            }

        }
    }
}
