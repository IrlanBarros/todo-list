<?php
    require_once '../app/views/layouts/header.php';
    require_once '../config/connection.php';

    $page = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch ($page) {
        case '/home':
        default:
            require_once '../app/views/home.php';
            break;
    }
    require_once '../app/views/layouts/footer.php';