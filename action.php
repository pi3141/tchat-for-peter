<?php
include 'connect.php';
include 'functions.php';

if (!empty($_POST['message'])){

    $now = new DateTime('now');

    $insertion = $bdd->prepare('INSERT INTO messages(pseudo, message, creationDate) VALUES(:pseudo, :message, NOW())');

    $insertion->execute([
        'pseudo' => $_POST['pseudo'] ?? 'anonyme',
        'message' => $_POST['message']
    ]);

    $lastInsertedId = $bdd->lastInsertId();
    $data = $_POST;
    $data['id'] = $lastInsertedId;
    $data['dateFormatted'] = $now->format('d/m/Y H:i');

    echo getMessageDisplay($data);
}