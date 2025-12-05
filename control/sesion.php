<?php
class sesion {

    // Tiempo máximo de inactividad en segundos (ej: 30 minutos)
    private static $timeout = 1800;

    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Si hay actividad previa
        if (isset($_SESSION['LAST_ACTIVITY'])) {
            // Si pasó más tiempo del permitido → destruir sesión
            if (time() - $_SESSION['LAST_ACTIVITY'] > self::$timeout) {
                session_unset();
                session_destroy();
                session_start(); // iniciar nueva sesión
            }
        }

        // Actualizar el tiempo de actividad
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public static function set($key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        self::start();
        return $_SESSION[$key] ?? null;
    }
}
