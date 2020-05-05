<!DOCTYPE html>
<html>
<head>
    <title>My tchat</title>
</head>

<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">

<div class="container">
    <?php
    $sessionOpened = false;
    session_start();
    session_destroy();

    if (empty($_SESSION['pseudo'])) {
        if (isset($_POST['pseudo'])) {
            $_SESSION['pseudo'] = $_POST['pseudo'];
            $sessionOpened = true;
        }
    }

    if ($sessionOpened) {
        include 'connect.php';
        include 'functions.php';
        include 'modalNewMsg.html';
        ?>

        <div class="mt-5 mb-5 d-flex justify-content-between">
            <div>
                Bienvenue <span id="pseudo" class="big-text"><?= $_SESSION['pseudo'] ?></span> !
            </div>
            <div>
                <button type="button" class="btn" data-toggle="modal" data-target="#modalNewMsg">
                    <i class="fa fa-plus-square big-icon"></i>
                </button>
            </div>
        </div>

        <div id="messages">
            <?php
            $query = $bdd->query('SELECT id, pseudo, message, DATE_FORMAT(creationDate, "%e/%m %H:%i") as dateFormatted FROM messages ORDER BY id DESC LIMIT 0,10');
            while($data = $query->fetch()){
                echo getMessageDisplay($data);
            }
            $query->closeCursor();
            ?>
        </div>

    <?php
    } else {
        include 'modalConnection.html';
    } ?>
</div>

<script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>
