jQuery(function ($) {
    eventHistory.add(function(){
        var bg;

        function setCookie(c_name,value,exdays){
            var exdate=new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
            document.cookie=c_name + "=" + c_value;
        }

        function getCookie(c_name){
            var i,x,y,ARRcookies=document.cookie.split(";");
            for (i=0;i<ARRcookies.length;i++){
                x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
                y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
                x=x.replace(/^\s+|\s+$/g,"");
                if (x==c_name)
                {
                return unescape(y);
                }
            }
        }

        bg = getCookie('bg');

        if(!$('#changeBg')[0]){
            var $bg = $('<div id="changeBg" />').attr('title', 'Change background').css({
                position: 'fixed',
                top: '50%',
                left: '0',
                background: '#000',
                width: '15px',
                padding: '10px 5px 5px 0',
                border: '1px solid #ccc',
                borderLeft: 'none',
                marginTop: '-80px'
            }).html('<a href="#"><img src="img/bg-pattern.png" width="15" height="15" /></a><br /><a href="#"><img src="img/bg-pattern-2.png" width="15" height="15" /></a><br /><a href="#"><img src="img/bg-pattern-3.png" width="15" height="15" /></a><br /><a href="#"><img src="img/bg-pattern-4.png" width="15" height="15" /></a><br /><a href="#"><img src="img/bg-pattern-5.png" width="15" height="15" /></a><br /><a href="#"><img src="img/bg-pattern-6.png" width="15" height="15" /></a><br /><a href="#"><img src="img/bg-pattern-7.png" width="15" height="15" /></a><br /><a href="#"><img src="img/bg-pattern-8.png" width="15" height="15" /></a>').appendTo($('body')).find('a').click(function(){
                $('body, #loading').css('background-image', 'url(' + $(this).find('img').attr('src') + ')');
                setCookie('bg', $(this).find('img').attr('src'), 365);
                return false;
            }).end();

            if(bg){
                $bg.find('img[src="' + bg + '"]').parent().click();
            }
        }

        $('body').unbind('jcomplete').bind('jcomplete', function(){
            var $a = $('<div>').html('<div class="alert grey air"><p><strong>Don’t worry!!</strong></p><p>This page is optional and created automatically, so you don’t have to create two menus.</p><a href="#" class="close">close</a></div>');
            $(this).append($a); $a.css('opacity', 0).animate({opacity: 1});
            var a = $('.menu li:has(.submenu):first a').attr({title: 'Try this one', 'data-position': 's'}).addClass('tooltip');
            setTimeout(function(){
                a.mouseenter().removeAttr('title').removeAttr('original-title');
            }, 100);
        });

        $('.slider').each(function(){
            var $this = $(this);

            if(!$this.is('.range')){
                $this.slider('option', 'value', 32);
            }
        });
    });
});
