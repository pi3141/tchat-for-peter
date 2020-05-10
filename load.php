<?php

include 'connect.php';
include 'functions.php';

$messages = getMessages($bdd, $_GET['status'] ?? 'VALIDE');
$messagesStr = '';

foreach ($messages as $message) {
    $messagesStr .= getMessageDisplay($message);
}

echo $messagesStr;