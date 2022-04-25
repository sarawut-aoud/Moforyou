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
function number(e) {
    if (window.event) { // IE
        keynum = e.keyCode;
    } else if (e.which) { // Netscape/Firefox/Opera
        keynum = e.which;
    }
    if(keynum == 101 || keynum == 69  ){
        event.returnValue = false;
    }
    // else if ((keynum == 65 || keynum == 110) && (keynum > 48) || (keynum < 58)) {
    //     event.returnValue = false;
    // }
}
// onkeypress="ชื่อฟังก์ชั่น(event)"