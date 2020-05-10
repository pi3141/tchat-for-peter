<?php
include 'connect.php';
include 'functions.php';

if (!empty($_POST['message'])){

    $now = new DateTime('now');

    $isAReply = isset($_POST['parentMsgId']) && !empty($_POST['parentMsgId']);

    $insertion = $bdd->prepare('INSERT INTO messages(pseudo, message, creationDate, status' .
        ($isAReply ? ', replyTo' : '') .
        ') VALUES(:pseudo, :message, NOW(), :status' .
        ($isAReply ? ', :parentMsgId' : '') . ')');

    $isAdmin = isAdmin();
    $status = $isAdmin ? 'VALIDE' : 'A_VALIDER';

    $params = [
        'pseudo' => $_POST['pseudo'] ?? 'anonyme',
        'message' => $_POST['message'],
        'status' => $status
    ];
    if ($isAReply) {
        $params['parentMsgId'] = (int)$_POST['parentMsgId'];
    }
    $insertion->execute($params);

    echo $isAdmin;
}