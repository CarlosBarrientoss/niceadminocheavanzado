<?php

require_once "conexion.php";

class LoginModel{

    public static function mdlVerifyUser($email) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM users WHERE user_email = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}