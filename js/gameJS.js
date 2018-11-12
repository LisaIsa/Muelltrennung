$(document).ready(function () {

    setInterval(function () {
        var browserHeight = $(window).height();
        var trashYPos = $('#img_trash').position().top;

        if (trashYPos >= browserHeight) {
            trashYPos = 0;
        }
        else {
            trashYPos = trashYPos + 1;
        }

        $('#img_trash').css('top', trashYPos);
    }, 10);

    $(document).keydown(function (event) {
        var trashWidth = $('#img_trash').width();
        var trashXPosLC = $('#img_trash').position().left;
        var trashXPosRC = trashXPosLC + trashWidth;
        //var sidebarXPos = $('#area_sidebar').position().left;
        var jumpDistance = $('#area_bin_green').width();
        var lowerLimit = -1 *(jumpDistance);
        var upperLimit = jumpDistance;
        var tolerance = 1;
        var KeyID = event.keyCode;

        console.log(trashXPosLC);
        console.log(jumpDistance);

        if (KeyID == 65) { // A (links)
            if (( trashXPosLC + tolerance ) > lowerLimit) {
                trashXPosLC = trashXPosLC - jumpDistance;
            }
        }
        if (KeyID == 68) { // D (rechts)
            if (( trashXPosLC - tolerance ) < upperLimit) {
                trashXPosLC = trashXPosLC + jumpDistance;
            }
        }

        event.cancelBubble = true;
        event.returnValue = false;

        // Das Element auf der x-Achse veschieben
        $('#img_trash').css('left', trashXPosLC);
        return event.returnValue;
    });


});