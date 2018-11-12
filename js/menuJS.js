$(document).ready(function () {
    $('#btn_spielen').click(function () {
        if ($('#tbx_spieler').val() != '') {
            $('#body').load('includes/multiplayer.inc.php', function () {
            });
            $.getScript("js/gameJS.js");
        }

        else {
            $('#tbx_spieler').focus();
            $('#area_spieler').addClass("has-error");
            $('#icon_spieler').removeClass("invisible");
            $('#tbx_spieler').popover({container: 'body', title: 'Twitter Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"});
        }
    });

    $('[data-toggle="popover"]').popover();
});

