<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', 'afpa33');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
