<?php

require_once "conexion.php";

class UserModel {

    public static function mdlUserSave($datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (:name, :email, :password)");

        $stmt->bindParam(":name", $datos["user_name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["user_email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["user_password"], PDO::PARAM_STR);

        return $stmt->execute() ? "ok" : "error";
    }
}
