function not_number(e) {
    if (window.event) { // IE
        keynum = e.keyCode;
    } else if (e.which) { // Netscape/Firefox/Opera
        keynum = e.which;
    }
    if(keynum == 32 && Space){
        event.returnValue = true;
    }
    else if ((keynum == 13 || keynum == 110) && (keynum > 48) || (keynum < 58)) {
        event.returnValue = false;
    }
}