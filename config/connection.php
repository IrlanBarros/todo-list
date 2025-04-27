<?php
    $user = 'irlanbarros';
    $pass = 'senhapostgrestemp';
    $host = 'localhost';
    $db_name = 'todolist';

    try {
        $connect = new PDO("pgsql:host=$host;dbname=$db_name", $user, $pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // echo "Ok!";
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }