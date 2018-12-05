<?php

$action = filter_input(INPUT_POST, 'action');

error_log($action);

switch ($action) {
    case 'getRanking':
        include 'queries/getRanking.inc.php';
        break;
    default:
        include 'includes/main.inc.php';
        include 'includes/menu.inc.php';
        break;
}
?>
