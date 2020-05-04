<?php

/**
 * @param array $data
 * @return string
 */
function getMessageDisplay($data) {
    return "<p id=\"" . $data['id'] . "\" class='post'>" .
        $data['message'] . "<br>" .
        '<span class="font-weight-bold">' . ($data['pseudo'] ?? 'anonyme') . "</span><br>" .
        '<span class="font-italic">' . $data['dateFormatted'] . "</span></p>";
}