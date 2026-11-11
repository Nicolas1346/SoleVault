<?php
$servidor = "127.0.0.1";
$banco    = "solevault";
$usuario  = "root";
$senha    = "";

try {
    $pdo = new PDO(
        "mysql:host=$servidor;port=3307;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Erro ao conectar ao banco de dados.");
}
