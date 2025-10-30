<?php
function isActive($path) {
    return strpos($_SERVER['REQUEST_URI'], $path) !== false;
}

function estaAutenticado() {
    return isset($_SESSION['usuario_id']);
}