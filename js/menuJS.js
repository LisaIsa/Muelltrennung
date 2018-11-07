$(document).ready(function () {
    $('#btn_spielen').click(function () {
        $('#body').load('includes/multiplayer.inc.php', function () {
        });
    });
});

