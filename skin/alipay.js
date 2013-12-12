var globalbank=0;
function setBank(bank){
    globalbank=bank;
}
 
function go_pay(a,bank) {
    jQuery(".col-main").append("<div id='overlay' style='background:#000;display:block;z-index:300;width:1200px;position:absolute;top:0;left:0;'></div>"), jQuery(document).scrollTop();
    var c = jQuery(document).scrollLeft(),
        d = jQuery('.main-container').height(),//jQuery(document).height(),
        e = jQuery('.col-main').outerWidth();
    jQuery("#overlay").css({
        opacity: "0.2",
        height: d,
        left: c,
        width: e
    });
    if(bank){
        window.open(a+"?bank="+bank, 'alipay', "width="+e+", height="+d+", top="+top+", left="+left);
    }else{
        window.open(a, 'alipay', "width="+e+", height="+d+", top="+top+", left="+left);
    }
    //console.log(jQuery('.col-main').offset().left);
    //console.log(e);
    //console.log(jQuery('#go_pay_window').outerWidth());
    var left  = (e/2)-(jQuery('#go_pay_window').outerWidth()/2),
    top   = (jQuery(window).height()/2)-(160/2);
    jQuery('#go_pay_window').css('left',left+"px");
    jQuery('#go_pay_window').css('top',top+"px");
    jQuery('#go_pay_window').fadeIn();
}

function window_close() {
    jQuery("#overlay").length > 0 && jQuery("#overlay").remove(), jQuery(".popup-wrap.popup-orderEnd").fadeOut()
}
