<?php
$usuario = sesion::get("idusuario");
$page = $_GET['page'] ?? null;
if($page!= "presentacion" && $page != ""){
    if (!$usuario && $page != "login" && $page != "crear") {
        header("Location: index.php?page=login");
        exit();
    }   
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
   
    if($page != "login" && $page != "crear"){
        require_once "vista/estructura/nav.php";
    }
    ?>
   