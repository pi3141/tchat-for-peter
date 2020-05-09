<?php
include 'connect.php';
include 'functions.php';

if (!empty($_POST['message'])){

    $now = new DateTime('now');

    $insertion = $bdd->prepare('INSERT INTO messages(pseudo, message, creationDate, status) VALUES(:pseudo, :message, NOW(), :status)');

    $status = $isAdmin ? 'VALIDE' : 'A_VALIDER';
    $insertion->execute([
        'pseudo' => $_POST['pseudo'] ?? 'anonyme',
        'message' => $_POST['message'],
        'status' => $status
    ]);

    echo $isAdmin;
}