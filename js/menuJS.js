$(document).ready(function () {
    $('#btn_multiplayer').click(function () {
        $('#body').load('includes/multiplayer.inc.php', function () {
        });
    });
});

