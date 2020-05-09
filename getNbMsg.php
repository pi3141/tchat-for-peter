<?php

include 'connect.php';
include 'functions.php';

$query = $bdd->prepare('SELECT COUNT(*) FROM messages WHERE status = :status');

$query->execute([
    'status' =>  $_GET['status']
]);

$data = $query->fetch();

echo $data[0];