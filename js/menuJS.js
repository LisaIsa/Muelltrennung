var interval = null;
window.player_name = null;
window.opponent_name = null;

$(document).ready(function () {
    $('#btn_play_game').click(function () {
        loginPlayer();
    });

    $('#btn_close_mdl').click(function () {
        $('#mdl_search_player').modal('toggle');
        clearInterval(interval);
    });

    $('#mdl_search_player').on('show.bs.modal', function (e) {
        $('#area_menu').addClass("backdrop");
    });

    $('#mdl_search_player').on('hidden.bs.modal', function () {
        $('#area_menu').removeClass("backdrop");
    });

    $('[data-toggle="popover"]').popover();

});

$(document).keydown(function (event) {
    var KeyID = event.keyCode;

    if (KeyID == 13) { // return
        event.preventDefault();
        loginPlayer();
    }
});

function loginPlayer() {
    if ($('#tbx_spieler').val() != '') {
        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                action: "setPlayer",
                player: $('#tbx_spieler').val()
            },
            success: function () {
                player_name = $('#tbx_spieler').val();
                searchPlayer();
            },
            error: function (request, error)
            {
                alert("FEHLER!!! Request: " + JSON.stringify(request));
            }
        });
    } else {
        $('#tbx_spieler').focus();
        $('#area_spieler').addClass("has-error");
        $('#icon_spieler').removeClass("invisible");
        $('#tbx_spieler').popover({container: 'body', title: 'Twitter Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"});
    }
}

function searchPlayer() {
    $('#mdl_search_player').modal('show');
    interval = setInterval(function () {
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {
                action: "getPlayer",
                player: player_name
            },
            dataType: 'json',
            success: function (data) {
                $.each(data, function (index, val) {
                    if (data[0] != "") {
                        opponent_name = val.Name;
                        clearInterval(interval);
                        createGame();
                    }
                });

            },
            error: function (request, error)
            {
                alert("FEHLER!!! Request: " + JSON.stringify(request));
            }
        });
    }, 1000);
}

function startGame() {
    $('#body').load('includes/multiplayer.inc.php', function () {
        $('#area_sidebar').load('includes/sidebar.inc.php', function () {
            $.getScript("js/trashJS.js");
            $.getScript("js/rankingJS.js");
        });
        $.getScript("js/gameJS.js");
    });
}

function createGame() {
    $.ajax({
        type: "POST",
        url: "index.php",
        data: {
            action: "setGame",
            player: player_name,
            opponent: opponent_name
        },
        success: function () {
            startGame()
        },
        error: function (request, error)
        {
            alert("FEHLER!!! Request: " + JSON.stringify(request));
        }
    });
}




