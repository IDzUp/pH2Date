jQuery(function($){
    $.loading = function(){
        var $loading, self;

        if($('#loading')[0])
            $loading = $('#loading');
        else
            $loading = $('<div id="loading">').html('<div class="inner"><div><div class="ajax-loader"></div><p>Loading<span>...</span></p></div></div>').hide();

        $('body').append($loading);

        return self = {
            start: function(){
                $loading.fadeIn();
                return self;
            },
            dismiss: function(){
                if($loading.is(':visible')){
                    $loading.hide();
                }
                return self;
            }
        }
    }
});
