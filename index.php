<?php

$action = filter_input(INPUT_POST, 'action');

$db_action = filter_input(INPUT_POST, 'db_action');

switch ($action) {
    case '.':
        break;
    default:
        include 'main.php';
        include 'includes/menu.inc.php';
        break;
}
?>
