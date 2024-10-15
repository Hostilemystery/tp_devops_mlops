<?php
$host = 'data';
$db   = 'testdb';
$user = 'testuser';
$pass = 'testpass';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);

     // Écriture dans la base de données
     $stmt = $pdo->prepare('INSERT INTO test_table (data) VALUES (?)');
     $stmt->execute([uniqid()]);

     // Lecture depuis la base de données
     $stmt = $pdo->query('SELECT * FROM test_table');
     $rows = $stmt->fetchAll();

     foreach ($rows as $row) {
         echo $row['id'] . ': ' . $row['data'] . '<br>';
     }
} catch (\PDOException $e) {
     echo 'Erreur de connexion : ' . $e->getMessage();
}
?>