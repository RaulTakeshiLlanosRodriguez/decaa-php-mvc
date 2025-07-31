<?php
function isActive($path) {
    return strpos($_SERVER['REQUEST_URI'], $path) !== false;
}