<?php

include 'connect.php';
include 'functions.php';

$query = $bdd->prepare('SELECT id, pseudo, message, DATE_FORMAT(creationDate, "%e/%m %H:%i") as dateFormatted, status FROM messages WHERE status = :status ORDER BY creationDate DESC LIMIT 0,10');

$query->execute([
    'status' =>  $_GET['status'] ?? 'VALIDE'
]);

$messages = '';

while ($data = $query->fetch()) {
    $messages .= getMessageDisplay($data);
}

echo $messages;