$(document).ready(function () {
    $('#btn_spielen').click(function () {
        startGame();
    });

    $(document).keydown(function (event) {
        var KeyID = event.keyCode;

        if (KeyID == 13) { // return
            event.preventDefault();
            startGame();
        }
    });

    function startGame() {
        if ($('#tbx_spieler').val() != '') {
            $('#body').load('includes/multiplayer.inc.php', function () {
                $('#area_sidebar').load('includes/sidebar.inc.php', function () {
                    $.getScript("js/rankingJS.js");
                });
                $.getScript("js/gameJS.js");
            });           
        }

        else {
            $('#tbx_spieler').focus();
            $('#area_spieler').addClass("has-error");
            $('#icon_spieler').removeClass("invisible");
            $('#tbx_spieler').popover({container: 'body', title: 'Twitter Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"});
        }
    }

    $('[data-toggle="popover"]').popover();
});

