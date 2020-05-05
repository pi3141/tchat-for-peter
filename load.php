<?php

include 'connect.php';

if (!empty($_GET['id'])) {

    include 'functions.php';

    $id = (int)$_GET['id'];

    $query = $bdd->prepare('SELECT id, pseudo, message, DATE_FORMAT(creationDate, "%Y") as dateFormatted FROM messages WHERE id > :id ORDER BY id DESC');
    $query->execute(array("id" => $id));

    $messages = '';

    while ($data = $query->fetch()) {
        $messages .= getMessageDisplay($data);
    }

    echo $messages;
}


