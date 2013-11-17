var iframeheight = 0;
var lastvcode = false;
var vcodeinit = false;
jQuery("#go_tab3").click(function(){
    lastvcode = false;
    vcodeinit = false; 
    jQuery("#select_tab").val(3);
    jQuery("#go_tab3").addClass("now");
    jQuery("#go_tab1").removeClass("now"); 
    jQuery("#go_tab2").removeClass("now");  
    jQuery('#tab1showmorenetbank').parent().parent().find('td[hidebanktype=netbank]').hide();
    jQuery('#tab1showmorenetbank').html('更多在线支付银行<span class="icon"></span>'); 
    jQuery('#tab1showmorenetbank1').parent().parent().find('td[hidebanktype=netbank]').hide();
    jQuery('#tab1showmorenetbank1').html('更多在线支付银行<span class="icon"></span>');  
    jQuery('#tab2showmorenetbank').parent().parent().find('td[hidebanktype=netbank]').hide();
    jQuery('#tab2showmorenetbank').html('更多在线支付银行<span class="icon"></span>');   
    jQuery('#tab2showmorenetbank1').parent().parent().find('td[hidebanktype=netbank]').hide();
    jQuery('#tab2showmorenetbank1').html('更多在线支付银行<span class="icon"></span>');    
    jQuery('#tab2showmorefastbank').parent().parent().find('td[hidebanktype=fastbank]').hide();
    jQuery('#tab2showmorefastbank').html('更多快捷支付银行<span class="icon"></span>');     
    jQuery('#tab2showmorefastbank1').parent().parent().find('td[hidebanktype=fastbank]').hide();
    jQuery('#tab2showmorefastbank1').html('更多快捷支付银行<span class="icon"></span>');      
    jQuery("#tab1").hide();  
    jQuery("#tab2").hide();   
    jQuery("#tab3").show();   
});
jQuery("#go_tab2").click(function(){
    lastvcode = false;
    vcodeinit = false;  
    jQuery("#select_tab").val(2);
    jQuery("#go_tab2").addClass("now");
    jQuery("#go_tab1").removeClass("now"); 
    jQuery("#go_tab3").removeClass("now");  
    jQuery('#tab1showmorenetbank').parent().parent().find('td[hidebanktype=netbank]').hide();
    jQuery('#tab1showmorenetbank').html('更多在线支付银行<span class="icon"></span>');
    jQuery('#tab1showmorenetbank1').parent().parent().find('td[hidebanktype=netbank]').hide();
    jQuery('#tab1showmorenetbank1').html('更多在线支付银行<span class="icon"></span>');
    jQuery("#tab2").show(); 
    jQuery("#tab1").hide();  
    jQuery("#tab3").hide();   
    if(jQuery('#tab2fpiframe')[0].src == '' || tab2iframenew)
    {
        jQuery('#tab2fpiframe').attr('src', jQuery('#fp_iframe2_src').val());
        time = G_GetTimeStmp();
        jQuery('#loading2').next('iframe').hide(); 
        jQuery('#loading2').show();
        tab2iframenew = false;
    } 
});
jQuery("#go_tab1").click(function(){
    lastvcode = false;
    vcodeinit = false; 
    jQuery("#select_tab").val(1);
    jQuery("#go_tab1").addClass("now");
    jQuery("#go_tab2").removeClass("now"); 
    jQuery("#go_tab3").removeClass("now");  
    jQuery('#tab2showmorenetbank').parent().parent().find('td[hidebanktype=netbank]').hide();
    jQuery('#tab2showmorenetbank').html('更多在线支付银行<span class="icon"></span>');
    jQuery('#tab2showmorenetbank1').parent().parent().find('td[hidebanktype=netbank]').hide();
    jQuery('#tab2showmorenetbank1').html('更多在线支付银行<span class="icon"></span>');
    jQuery('#tab2showmorefastbank').parent().parent().find('td[hidebanktype=fastbank]').hide();
    jQuery('#tab2showmorefastbank').html('更多快捷支付银行<span class="icon"></span>');
    jQuery('#tab2showmorefastbank1').parent().parent().find('td[hidebanktype=fastbank]').hide();
    jQuery('#tab2showmorefastbank1').html('更多快捷支付银行<span class="icon"></span>');
    jQuery("#tab2").hide();  
    jQuery("#tab3").hide();   
    jQuery("#tab1").show();  
    if(jQuery('#tab1fpiframe')[0].src == '' || tab1iframenew)
    {
        jQuery('#tab1fpiframe').attr('src', jQuery('#fp_iframe1_src').val());
        time = G_GetTimeStmp();
        jQuery('#loading1').next('iframe').hide(); 
        jQuery('#loading1').show();
        tab1iframenew = false;
    } 
});
jQuery(".bank_select").click(function (e) {
        var radio = jQuery(this).find('input:radio');
        jQuery('#netbanckselectimg').attr('src', jQuery(this).find('img').get(0).src);
        jQuery('#selecthint').html(jQuery(this).next('p.hint').html());
        radio.attr({ checked: "checked" });
        var st = radio.attr('checked');
        if (st) { 
        var bid = jQuery(this).attr('bid');
//        if(jQuery.inArray(bid, suspend_ids_arr)>=0)
//        {
//            jQuery("#bank_tips").show();
//            jQuery(".tips_span").hide();
//            jQuery("#tips_span_"+bid).show();
//        }
//        else
//        {
//             jQuery("#bank_tips").hide();
//        }
        jQuery("#s_id").val(bid); 
        jQuery('a.none:visible').removeClass("none");
        jQuery('.btn_next a[name=payhref]:hidden').addClass("none");
        //jQuery(".paylist_btn").show();
        //jQuery(".m_radio").hide();
        //CheckPlatType(bid);
        }
    });
jQuery('#tab1showmorenetbank').click( function (e) {
    if(jQuery('#tab1showmorenetbank').find('span')[0].className == 'icon'){
        jQuery('#tab1showmorenetbank').parent().parent().find('td[hidebanktype=netbank]').show();
        jQuery('#tab1showmorenetbank').html('收起全部银行<span class="icon up"></span>');
    }
    else{
        jQuery('#tab1showmorenetbank').parent().parent().find('td[hidebanktype=netbank]').hide();
        jQuery('#tab1showmorenetbank').html('更多在线支付银行<span class="icon"></span>');
    }
}); 
jQuery('#tab1showmorenetbank1').click( function (e) {
    if(jQuery('#tab1showmorenetbank1').find('span')[0].className == 'icon'){
        jQuery('#tab1showmorenetbank1').parent().parent().find('td[hidebanktype=netbank]').show();
        jQuery('#tab1showmorenetbank1').html('收起全部银行<span class="icon up"></span>');
    }
    else{
        jQuery('#tab1showmorenetbank1').parent().parent().find('td[hidebanktype=netbank]').hide();
        jQuery('#tab1showmorenetbank1').html('更多在线支付银行<span class="icon"></span>');
    }
}); 
jQuery('#tab2showmorenetbank').click( function (e) {
    if(jQuery('#tab2showmorenetbank').find('span')[0].className == 'icon'){
        jQuery('#tab2showmorenetbank').parent().parent().find('td[hidebanktype=netbank]').show();
        jQuery('#tab2showmorenetbank').html('收起全部银行<span class="icon up"></span>');
    }
    else{
        jQuery('#tab2showmorenetbank').parent().parent().find('td[hidebanktype=netbank]').hide();
        jQuery('#tab2showmorenetbank').html('更多在线支付银行<span class="icon"></span>');
    }
});
jQuery('#tab2showmorenetbank1').click( function (e) {
    if(jQuery('#tab2showmorenetbank1').find('span')[0].className == 'icon'){
        jQuery('#tab2showmorenetbank1').parent().parent().find('td[hidebanktype=netbank]').show();
        jQuery('#tab2showmorenetbank1').html('收起全部银行<span class="icon up"></span>');
    }
    else{
        jQuery('#tab2showmorenetbank1').parent().parent().find('td[hidebanktype=netbank]').hide();
        jQuery('#tab2showmorenetbank1').html('更多在线支付银行<span class="icon"></span>');
    }
});
jQuery('#tab1showmorefastbank').click( function (e) {
    if(jQuery('#tab1showmorefastbank').find('span')[0].className == 'icon'){
        jQuery('#tab1showmorefastbank').parent().parent().find('td[hidebanktype=fastbank]').show();
        jQuery('#tab1showmorefastbank').html('收起全部银行<span class="icon up"></span>');
    }
    else{
        jQuery('#tab1showmorefastbank').parent().parent().find('td[hidebanktype=fastbank]').hide();
        jQuery('#tab1showmorefastbank').html('更多快捷支付银行<span class="icon"></span>');
    }
}); 
jQuery('#tab2showmorefastbank').click( function (e) {
    if(jQuery('#tab2showmorefastbank').find('span')[0].className == 'icon'){
        jQuery('#tab2showmorefastbank').parent().parent().find('td[hidebanktype=fastbank]').show();
        jQuery('#tab2showmorefastbank').html('收起全部银行<span class="icon up"></span>');
    }
    else{
        jQuery('#tab2showmorefastbank').parent().parent().find('td[hidebanktype=fastbank]').hide();
        jQuery('#tab2showmorefastbank').html('更多快捷支付银行<span class="icon"></span>');
    }
});
jQuery('#tab2showmorefastbank1').click( function (e) {
    if(jQuery('#tab2showmorefastbank1').find('span')[0].className == 'icon'){
        jQuery('#tab2showmorefastbank1').parent().parent().find('td[hidebanktype=fastbank]').show();
        jQuery('#tab2showmorefastbank1').html('收起全部银行<span class="icon up"></span>');
    }
    else{
        jQuery('#tab2showmorefastbank1').parent().parent().find('td[hidebanktype=fastbank]').hide();
        jQuery('#tab2showmorefastbank1').html('更多快捷支付银行<span class="icon"></span>');
    }
});

function showallbank(i)
{
    if(i == 5){
        jQuery('#info_h3').html('选择网上银行或平台支付');
        jQuery('#indo_array').html(''); 
        jQuery('#bind_card_area').hide(); 
        jQuery('#payment_pop').hide(); 
        if(jQuery('#select_tab').val() == 1)
        {
//            jQuery('#tab1fpiframe').attr('src', jQuery('#fp_iframe1_src').val());
//            tab1iframenew = false;
//            jQuery('#loading1').next('iframe').hide(); 
//            jQuery('#loading1').show(); 
            jQuery("#go_tab1").trigger("click");
        }
        else if(jQuery('#select_tab').val() == 2)
        {
//            jQuery('#tab2fpiframe').attr('src', jQuery('#fp_iframe2_src').val());
//            tab2iframenew = false;
//            jQuery('#loading2').next('iframe').hide(); 
//            jQuery('#loading2').show(); 
            jQuery("#go_tab2").trigger("click");
        }
        else if(jQuery('#select_tab').val() == 3){
            jQuery("#go_tab3").trigger("click");
        }
        if(jQuery('#fp_iframe1_src').val() != '')
        {
            jQuery('#tab1secondpayfastbankall').hide();
            jQuery('#tab1secondpayfastbank').show();
        }
        if(jQuery('#fp_iframe2_src').val() != '')
        {
            jQuery('#tab2secondpayfastbankall').hide();
            jQuery('#tab2secondpayfastbank').show();
        }
        jQuery('#confirm_net_bank_area').hide();
        jQuery('#paycenter_area').show();  
       jQuery('#tab1secondpaynetbankdefault').hide();
       jQuery('#tab2secondpaynetbankdefault').hide();
       jQuery('#tab1secondpaynetbankall').show();
       jQuery('#tab2secondpaynetbankall').show();
       jQuery('#tab3firstpay').show();
       jQuery('#tab3secondpay').hide();
        jQuery('#tab1secondpaynetbankall').find('input:radio:checked').removeAttr("checked");
        jQuery('#tab1firstpay').find('input:radio:checked').removeAttr("checked");
        jQuery('#tab2secondpaynetbankall').find('input:radio:checked').removeAttr("checked");
        jQuery('#tab2firstpay').find('input:radio:checked').removeAttr("checked");
        jQuery('#tab3firstpay').find('input:radio:checked').removeAttr("checked");
        jQuery('.btn_next a[name=payhref]').addClass('none');
        jQuery('#bind_area_go_else_link').hide();
    }
    if(i ==1){
    jQuery('#tab1secondpayfastbank').hide();
    jQuery('#tab1secondpayfastbankall').show();
    jQuery('#tab1secondpayfastbankall').find('input:radio:checked').removeAttr("checked");
    jQuery('#tab1button1').show();   
    jQuery('#returnfastpaylink1').show();
   }  
   else if(i == 2){
   jQuery('#tab2secondpayfastbank').hide();
    jQuery('#tab2secondpayfastbankall').show();
   jQuery('#tab2button1').show();   
   jQuery('#tab2secondpayfastbankall').find('input:radio:checked').removeAttr("checked");
       jQuery('#tab1nextbutton').addClass('none');
      jQuery('#returnfastpaylink2').show(); 
   }
   else if(i == 3){
   jQuery('#tab1secondpaynetbankdefault').hide();
   jQuery('#tab1secondpaynetbankother').hide();
    jQuery('#tab1secondpaynetbankall').show();
   jQuery('#tab1button1').show();  
   }
   else if(i == 4){
   jQuery('#tab2secondpaynetbankdefault').hide();
   jQuery('#tab2secondpaynetbankother').hide();
    jQuery('#tab2secondpaynetbankall').show();
   jQuery('#tab2button1').show(); 
      jQuery('#tab2nextbutton').addClass('none');
   }
   else if(i == 6)
   {
    jQuery('#tab3secondpay').hide();
    jQuery('#tab3firstpay').show();
     
   }
   else if(i == 7)
   {
    window.history.back(); 
   }
}
var srp_tab1 = false;
var srp_tab2 = false;
jQuery('#tab1fpiframe').mouseenter(function(){
    if(srp_tab1 == false){
        var url = jQuery('#fp_srp_ajax_tab1').val();
        $.get( url, function(result){
            srp_tab1 = true;
        });
    } 
});
jQuery('#tab2fpiframe').mouseenter(function(){
    if(srp_tab2 == false){
        var url = jQuery('#fp_srp_ajax_tab2').val();
        $.get( url, function(result){
            srp_tab2 = true;
        });
    } 
});


var CrossDomain = CrossDomain || {};
CrossDomain.attachEvent = function(handler){
    handler=handler||window.event;
    window.attachEvent ? window.attachEvent("onmessage", handler) : window.addEventListener && window.addEventListener("message", handler, false);
};
CrossDomain.postMessage = function(msg){
    var target;
    if (typeof msg !== "string") { //数据格式有误
        return false;
    }
//    if (window === parent) { //非iframe嵌套，无需跨域请求
//        return false;
//    } else {
//        target = parent;
//    }
    if(jQuery('#paycenter_area').css('display') == 'block')
   { 
        if(jQuery("#select_tab").val() == '1')
       { 
        target = jQuery('#tab1fpiframe')[0].contentWindow;
       } 
      else if(jQuery("#select_tab").val() == '2')
       { 
        target = jQuery('#tab2fpiframe')[0].contentWindow;
       }  
   } 
   else
   {
        target = jQuery('#bind_card_iframe')[0].contentWindow;
   }
    if (window.postMessage) {
        try {
            target.postMessage(msg, "*");
        } catch (e) {
            return false;
        }
    } else {
        var fn = navigator._tenpayCrossCall;
        fn && fn(msg);
    }
    return true;
};
CrossDomain.receiveMessage = function(callback){
    if (window.postMessage) {
        CrossDomain.attachEvent(function(e){
            e = e || window.event;
            //console.log(e.data);
            callback(e.data);
        });
    } else {
        navigator._payCrossCall = callback;
    }
}

CrossDomain.receiveMessage(function(data)
{
    data = eval('(' + data + ')');
   jQuery('div.shortcut_bank_list_loading:visible').next('iframe').show(); 
   jQuery('div.shortcut_bank_list_loading:visible').hide(); 
   if(data['msg'] == 'init')
   {
        if(lastvcode == true)
        {
            lastvcode = false;
            vcodeinit = false;
        }
//        if(vcodeinit == true)
//        {
//            if(jQuery('iframe:visible').height()<308)
//            {
//                jQuery('iframe:visible').height('308');
//            }
//        }
//        else
//        {
            if(jQuery('#select_tab').val() == 1){ 
                var url = jQuery('#fp_srp_ajax_tab1').val();
                $.get( url, function(result){
                });
            }
            else if(jQuery('#select_tab').val() == 2){ 
                var url = jQuery('#fp_srp_ajax_tab2').val();
                $.get( url, function(result){
                });
            }
            if(jQuery('iframe:visible').height()<226)
            {
                jQuery('iframe:visible').height('226');
            }
//        }
//        if(vcodeinit == false)
        {
            if(iframeheight == 0){
                iframeheight = jQuery('iframe:visible').height();
            }
            else
            {
                jQuery('iframe:visible').height(iframeheight);
            }
        }
        vcodeinit = false;
        lastvcode = false;
        return;
   }
   else if(data['msg'] == 'novcode')
   {
    lastvcode = true;
    if(jQuery('iframe:visible').height()<308)
        {
            jQuery('iframe:visible').height('308');
        }
        return;
   }
   else if(data['msg'] == 'getBeginTime')
   {
    CrossDomain.postMessage('{"msg":"setBeginTime","time":'+time+'}');
   }
   else{
        if(lastvcode == true)
        {
            lastvcode = false;
            vcodeinit = true;
        }
   }
    if(data['height']<93)
   {
    return;
   } 
   if(jQuery('#bind_card_area').css('display') == 'block')
   {
         if(data['height']<200)
        {
            return;
        } 
   }
   if(jQuery('iframe:visible')[0].id == 'tab1fpiframe' || jQuery('iframe:visible')[0].id == 'tab2fpiframe')
   {
    jQuery('iframe:visible').height(data['height']+26);
   return; 
   }
    jQuery('iframe:visible').height(data['height']+60);
});

function pay(){


}

jQuery('a[name=payhref]').click(function(){
    if(jQuery(this)[0].className == 'none')
   {
        jQuery('#tab_box').html('<div class="pup_qpay w330"><div class="pup_title"><a class="close"></a>提示</div><p class="middle"><span class="icon icon_r"></span>请选择一家银行！</p><p class="middle"><a class="btn_org" href="javascript:closeWindow();" style="text-decoration: none;">确定</a></p></div>');
        jQuery('#tab_box').show();
        postionTabBox();
        return false;
   } 
    var suspend_info = jQuery('#suspend_ids').val();
    var suspend_item_array =  suspend_info.split(',');
    var bid = jQuery('#s_id').val();
    for(var i = 0;i< suspend_item_array.length;i++){
        var supend_item =  suspend_item_array[i];
        var supend_id = supend_item.split('|')[0];
        if(supend_id == bid){
            var text = "您选择的"+ supend_item.split('|')[1] +"正在维护。"
            jQuery('#span_bank_name').html(text); 
            jQuery('#btn_banktipdetail').attr('href',supend_item.split('|')[2]);
            jQuery('#payment_pop').show();
            postionWindow();
            return false;
        }
    } 
   var sid = jQuery('#s_id').val();
   if(jQuery('input:radio:visible[checked=checked]').length >0)
   {
    sid = jQuery('input:radio:visible[checked=checked]').first().parent().attr('bid');
    //jQuery('#netbanckselectimg').attr('src', jQuery('input:radio:visible[checked=checked]').first().next('.pic').find('img').first().attr('src'));
   //jQuery('#selecthint').html(jQuery('input:radio:visible[checked=checked]').first().parent().next('p.hint').html()); 
    jQuery('#s_id').val(sid);
   }
//    if(sid>150)
//   {
//        return true;
//   }
    //jQuery('#confirm_net_bank_area').show();
   //jQuery('#confirm_net_bank_a').removeClass('none'); 
   //jQuery('#paycenter_area').hide(); 
//    if(jQuery('#select_tab').val() == 1){ 
//        jQuery('#netbankselecttype').html('储蓄');
//    } 
//   else if(jQuery('#select_tab').val() == 2){ 
//        jQuery('#netbankselecttype').html('信用');
//    } 
//   else{
//        jQuery('#netbankselecttype').hide();
//    }   
//   if(sid<150)
//   {
//        return false;
//   }
});
jQuery('a.close').live("click",function(){
    jQuery('#payment_pop').hide(); 
    jQuery('#tab_box').hide();  
});
function closeWindow()
{
    //jQuery('#payment_pop').hide(); 
    jQuery('#tab_box').hide();  
}

function postionWindow() {
	var lin = document.getElementById('payment_pop');
	screenwidth = jQuery(window).width();
	screenheight = jQuery(window).height();
	mytop = jQuery(document).scrollTop();
	myleft = jQuery(document).scrollLeft();
	getPosLeft = screenwidth / 2 - 211;
	getPosTop = screenheight / 2 - 124;
	lin.style.left = getPosLeft + myleft + "px";
	lin.style.top = getPosTop + mytop + "px";
}
function postionTabBox() {
	var lin = document.getElementById('tab_box');
	screenwidth = jQuery(window).width();
	screenheight = jQuery(window).height();
	mytop = jQuery(document).scrollTop();
	myleft = jQuery(document).scrollLeft();
	getPosLeft = screenwidth / 2 - 211;
	getPosTop = screenheight / 2 - 124;
	lin.style.left = getPosLeft + myleft + "px";
	lin.style.top = getPosTop + mytop + "px";
}

jQuery('#confirm_net_bank_a').click(function(){
    var suspend_info = jQuery('#suspend_ids').val();
    var suspend_item_array =  suspend_info.split(',');
    var bid = jQuery('#s_id').val();
    for(var i = 0;i< suspend_item_array.length;i++){
        var supend_item =  suspend_item_array[i];
        var supend_id = supend_item.split('|')[0];
        if(supend_id == bid){
            var text = "您选择的"+ supend_item.split('|')[1] +"正在维护。"
            jQuery('#span_bank_name').html(text); 
            jQuery('#btn_banktipdetail').attr('href',supend_item.split('|')[2]);
            jQuery('#payment_pop').show();
            postionWindow();
            return false;
        }
    }  
});
var tab1iframenew = true;
var tab2iframenew = true; 
jQuery(function(){
    var num = jQuery('#select_tab').val();
   if(jQuery('#paycenter_area').css('display') == 'block')
   {
        if(num == 1)
        {
            jQuery("#go_tab1").trigger("click");
        }
       else if(num == 2)
        {
            jQuery("#go_tab2").trigger("click");
        }
       else if(num == 3)
        {
            jQuery("#go_tab3").trigger("click");
        }
   } 
//    jQuery('#tab1fpiframe').attr('src', jQuery('#fp_iframe1_src').val());
//    jQuery('#loading1').next('iframe').hide(); 
//    jQuery('#loading1').show();
//    jQuery('#tab2fpiframe').attr('src', jQuery('#fp_iframe2_src').val());
//    jQuery('#loading2').next('iframe').hide(); 
//    jQuery('#loading2').show();      
});

function showiframe(i)
{
    if(i == 1)
   {
        if(jQuery('#fp_iframe1_src').val() != '')
        {
            jQuery('#tab1secondpayfastbank').show();
            jQuery('#tab1secondpayfastbankall').hide();
            jQuery('#returnfastpaylink1').hide();
        }
   } 
   else if(i == 2)
   {
        if(jQuery('#fp_iframe2_src').val() != '')
        {
            jQuery('#tab2secondpayfastbank').show();
            jQuery('#tab2secondpayfastbankall').hide();
            jQuery('#returnfastpaylink2').hide();
        }
   }
}
function G_GetTimeStmp() {
    return (new Date()).getTime();
};
