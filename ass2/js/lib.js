function keyfunc(selector,exp) {
    jQuery(selector).keyup(function (event) {
        check(jQuery(selector),exp);
    });
}

function check(selector,exp){

    var val = jQuery(selector).val();
    var sub;
    if(jQuery(selector).val().match(exp)){
        sub = jQuery(selector).val().substr(0, jQuery(selector).val().length - 1);
        jQuery(selector).val(sub);
    }
}