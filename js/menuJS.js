$(document).ready(function () {
    $('[data-toggle="popover"]').popover()
    
    $('#btn_spielen').click(function () {
        if ($('#tbx_spieler').val() != '') {
            $('#body').load('includes/multiplayer.inc.php', function () {
            });
            $.getScript("js/gameJS.js");
        }

        else {
            console.log("JA");
            $('#tbx_spieler').focus();
            $('#area_spieler').addClass("has-error");
            $('#icon_spieler').removeClass("invisible");
            $('#tbx_spieler').popover({container: 'body', title: 'Twitter Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"})
            $('#tbx_spieler').blur(function () {
                $(this).popover('hide');
            });
        }
    });
});

