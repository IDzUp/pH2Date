/* ------------------------------------------------------------------------
    Author: Lucas Pelegrino
    Version: 1.0
------------------------------------------------------------------------- */(function($){
    $.fn.modal = function(options) {
            if(options == 'close'){
                close();
            }else if(options == 'current'){
                return getCurrentModal();
            }else{
                var defaults = {
                    top: '200px',
                    overlayOpacity: 0.5,
                    closeSelector: '.close'
                }, $overlay = null, $modal = null;

                if(this[0]){
                    options = $.extend(defaults, options);

                    if($('#overlay')[0])
                        $overlay = $('#overlay');
                    else
                        $overlay = $('<div id="overlay"></div>');

                    $overlay.css({background: 'black', width: '100%', height: '100%', position: 'fixed', zIndex: 9998, top: 0, left: 0}).hide();
                    $('body').append($overlay);


                      $modal = $(this);
                    $modal.find(options.closeSelector).click(function(e){ return false; }).click(close);
                    $overlay.click(close).fadeTo(350, options.overlayOpacity);

                      var width = $modal.outerWidth(),
                        height = $modal.outerHeight(),
                        cssOptions = {
                            position: 'fixed',
                            zIndex: 9999,
                            left: '50%',
                            marginLeft: -(width/2) + 'px',
                            top: options.top
                        };

                    if(options.top == 'center'){
                        options.top = '50%';
                        options.marginTop = -(height/2) + 'px';
                    }

                    $modal.css(cssOptions).removeAttr('hidden').hide().fadeIn().addClass('modal-window').removeClass('modal-window-hidden');
                }
                return this;
            }

            function close(){
                $overlay.fadeOut(200);
                $modal.removeClass('modal-window').addClass('modal-window-hidden').hide();
            }
            function getCurrentModal(){
                return $modal;
            }
        }
})(jQuery);
