<?php
include 'connect.php';
include 'functions.php';

if ($isAdmin) {
    if (!empty($_POST['id'] && !empty($_POST['status']))) {

        $query = $bdd->prepare('UPDATE messages SET status = :status WHERE id = :id');

        $query->execute([
            'status' => $_POST['status'],
            'id' => $_POST['id']
        ]);
    }
}