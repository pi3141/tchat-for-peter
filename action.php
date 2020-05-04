<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tchat;charset=utf8', 'root', 'bingo',  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

include 'functions.php';

if (!empty($_POST['message']) && !empty($_POST['pseudo'])){

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
else{
    echo "Vous avez oublié de remplir un des champs !";
}