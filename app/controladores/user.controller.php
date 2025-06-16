<?php
require_once "modelos/user.model.php";

class UserController {

    public function ctrUserSave() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Validación básica
            $name = trim($_POST["nombre"]);
            $email = filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL);
            $password = $_POST["clave"];

            if (!$name || !$email || strlen($password) < 8) {
                echo "<div class='alert alert-danger'>Datos inválidos</div>";
                return;
            }

            // Encriptar la contraseña
            $passwordHash = password_hash($clave, PASSWORD_DEFAULT);

            $data = [
                "user_name" => $name,
                "user_email" => $email,
                "user_password" => $passwordHash
            ];

            $response = UserModel::mdlUserSave($data);

            if ($response === "ok") {
                echo "<div class='alert alert-success'>Usuario registrado correctamente</div>";
            } else {
                echo "<div class='alert alert-danger'>Error al registrar usuario</div>";
            }
        }
    }
}
