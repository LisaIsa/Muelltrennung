$(document).ready(function () {

    setInterval(function () {
        var browserHeight = $(window).height();
        var trashYPos = $('#obj_trash').position().top;

        if (trashYPos >= browserHeight) {
            trashYPos = 0;
        }
        else {
            trashYPos = trashYPos + 1;
        }

        $('#obj_trash').css('top', trashYPos);
    }, 10);

    $(document).keydown(function (event) {
        var trashWidth = $('#obj_trash').width();
        var trashXPosLC = $('#obj_trash').position().left;
        var trashXPosRC = trashXPosLC + trashWidth/2;
        var sidebarXPos = $('#area_sidebar').position().left;
        var KeyID = event.keyCode;

        if (KeyID == 65) { // A (links)
            if (trashXPosLC >= 0) {
                trashXPosLC = trashXPosLC - 20;
            }
        }
        if (KeyID == 68) { // D (rechts)
            if (trashXPosRC <= sidebarXPos) {
                trashXPosLC = trashXPosLC + 20;
            }
        }

        event.cancelBubble = true;
        event.returnValue = false;

        // Das Element auf der x-Achse veschieben
        $('#obj_trash').css('left', trashXPosLC);
        return event.returnValue;
    });


});