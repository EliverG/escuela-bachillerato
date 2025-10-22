<?php
try {
    $pdo = new PDO(
        "mysql:host=127.0.0.1;port=3307;dbname=escuela_bachillerato;charset=utf8mb4",
        "root",
        ""
    );
    echo "✅ Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
