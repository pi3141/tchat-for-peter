<?php

/**
 * @param array $data
 * @return string
 */
function getMessageDisplay($data) {

    switch ($data['status']) {
        case 'A_VALIDER':
            $buttonsValidation =
                '<div class="text-right">
                    <i class="fa fa-smile medium-icon green pr-2 pointer" onclick="moderateMsg($(this), 1)"></i>
                    <i class="fas fa-angry medium-icon red pointer" onclick="moderateMsg($(this), 0)"></i>
                </div>';
            break;
        default:
            $buttonsValidation = '';
    }

    return "<p id=\"" . $data['id'] . "\" class='post'>" .
        '<span class="font-weight-bold">' . ($data['pseudo'] ?? 'anonyme') . "</span><br>" .
        '<span class="font-italic">' . $data['dateFormatted'] . "</span><br>" .
        $data['message'] . $buttonsValidation . "</p>";
}

session_start();
include 'data.php';
$isAdmin = ($_SESSION['pseudo'] == $nameAdmin);