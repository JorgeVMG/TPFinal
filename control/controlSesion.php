<?php
class controlSesion{
    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function requireLogin() {
        self::start();
        if (!isset($_SESSION['idusuario'])) {
            header("Location: login.php");
            exit();
        }
    }

    public static function requireRole($role) {
        self::start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != $role) {
            header("Location: no_permisos.php");
            exit();
        }
    }
    public static function control($menu){
        self::start();
        
        $_SESSION["rol"];
        $_SESSION["usuario"];
    }
}
