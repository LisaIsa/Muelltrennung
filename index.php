<?php

$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'getRanking':
        include 'queries/getRanking.inc.php';
        break;
    case 'setPlayer':
        $player = filter_input(INPUT_POST, 'player');
        include 'queries/setPlayer.inc.php';
        break;
    case 'getPlayer':
        $player = filter_input(INPUT_POST, 'player');
        include 'queries/getPlayer.inc.php';
        break;
    case 'getTrash':
        $counter = filter_input(INPUT_POST, 'counter');
        include 'queries/getTrash.inc.php';
        break;
    case 'setGame':
        $player = filter_input(INPUT_POST, 'player');
        $opponent = filter_input(INPUT_POST, 'opponent');
        include 'queries/setGame.inc.php';
        break;
    case 'setFinish':
        $player = filter_input(INPUT_POST, 'player');
        include 'queries/setFinish.inc.php';
        break;
    case 'setTimestamp':
        $timestamp = filter_input(INPUT_POST, 'timestamp');
        $player = filter_input(INPUT_POST, 'player');
        include 'queries/setTimestamp.inc.php';
        break;
    default:
        include 'includes/main.inc.php';
        include 'includes/menu.inc.php';
        break;
}
?>
