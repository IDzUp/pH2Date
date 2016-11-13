// onready
jQuery(function($){
    eventHistory.add(function(){
        /*============
            Modal
        ==============*/
        $('.modal').click(function(e){
            $($(this).attr('href')).modal({top: 'center'});
            e.preventDefault();
        });


        /*============
            Submenus
        ==============*/
        (function(){
            // show/hide submenu
            $('#wrapper > header nav > ul > li:has(.submenu)').mouseenter(function(){
                $(this).find('.submenu').stop(true, true).slideDown('slow', 'easeOutQuad');
            }).mouseleave(function(){
                $(this).find('.submenu').slideUp('normal');
            })

            $('#wrapper > header nav > ul > li > a').click(function(e){
                if($(this).attr('href') == '#') e.preventDefault();
            });
        })();


        /*============
            Bar
        ==============*/
        $('.bar .search input[type=text]').hide();

        $('.bar .search').click(function(e){
            var $this = $(this);
            var $text = $this.find('input[type=text]');
            if(!$this.is('.open')){
                $this.addClass('open');
                $text.show().focus();
                if($(e.target).is('input[type=submit]'))
                    e.preventDefault();
            }
        });

        $('body').click(function(e){
            var $search = $('.bar .search input[type=text]');
            if($search.closest('.search').is('.open')){
                var $target = $(e.target);
                if(!$target.is($search) && !$target.is($search.closest('.search')) && !$target.is($search.parent()) && !$target.is($search.prev())){
                    $search.hide().closest('.search').removeClass('open');
                }
            }
        });

        /*============
            Form
        ==============*/
        // icons
        $('input[data-icon]').each(function(){
            var $this = $(this);
            var icon = $this.attr('data-icon');

            $this.before('<label class="glyph ' + icon + '" for="' + $this.attr('id') + '"></label>').parent().addClass('iconized').end().prev().css({top: $this.position().top+7, left: $this.position().left+8})
        });

        // wysiwyg
        if($.browser.msie && $.browser.version < 9){
            $('.editor').html('Content');
            $('html').addClass('ie');
        }
        $('.editor').elrte({
            toolbar: 'normal',
            styleWithCSS : false,
            height: 300
        });

        // validation
        $('.validate').validate({
            onclick: false,
            onkeyup: false,
            onfocusout: false,
            success: function(label) {
                label.parent().removeClass('error-container');
            },
            errorPlacement: function(error, element) {
                element.parent().addClass('error-container').append(error);
            }
        });

        // filemanger
        $('.filemanager').elfinder({
            url : 'connectors/php/connector.php',
            toolbar : [
                ['back', 'reload'],
                ['select', 'open'],
                ['quicklook', 'rename'],
                ['resize', 'icons', 'list']
            ],
            contextmenu : {
                cwd : ['reload', 'delim', 'info'],
                file : ['select', 'open', 'rename'],
            }
        });

        // masks
        $.mask.definitions['~']='[+-]';
        $('.mask-date').mask('99/99/9999');
        $('.mask-phone').mask('(999) 999-9999');
        $('.mask-phoneext').mask("(999) 999-9999? x99999");
        $(".mask-tin").mask("99-9999999");
        $(".mask-ssn").mask("999-99-9999");
        $(".mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
        $(".mask-eyescript").mask("~9.99 ~9.99 999");

        // colorpicker
        $('.colorpicker').miniColors();

        // datepicker
        $('.datepicker').datepicker();

        // datepicker
        $('.datetimepicker').datetimepicker();

        // full calendar
        $('.fullcalendar').fullCalendar({
            editable: true,
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            }
        });

        // textarea
        $('.autogrow').autoGrow();

        // custom file input
        $('.custom-file-input').customFileInput();

        // chosen select
        $('.chosen').chosen();

        // custom checkboxes and radios
        $('input').checkBox();

        // spinner
        $('.number:not(.currency)').spinner();

        // currency spinner
        $('.currency.number').spinner({
            prefix: '$',
            group: ',',
            step: 0.5,
            largeStep: 5,
            min: -1000000,
            max: 1000000
        });

        // check/uncheck all
        $('.check-all input').click(function(){
            var $checkAll = $(this);
            var $allChecks = $checkAll.closest('table').find('tbody .checkbox input[type=checkbox]');
            var $datatable = $checkAll.closest('.datatable');

            if($checkAll.prop('checked')){
                $allChecks.checkBox('changeCheckStatus', true);
            }else{
                $allChecks.checkBox('changeCheckStatus', false);
            }

            if($datatable[0])
                $datatable.closest('.boxed-table').find('.paginate_button').click(function(){ $checkAll.checkBox('changeCheckStatus', false); });
        });

        /*============
            Miscellaneous
        ==============*/

        FORMALIZE.init.placeholder();

        (function(){

            var ajaxOptions = {
                dataType: 'text',
                beforeSend: function(jqXHR){
                    fadeContentNicely();
                    $.loading().start();
                },
                error: function(jqXHR, textStatus){
                    alert('AJAX request error status. Status: ' + jqXHR.status + ' ' + jqXHR.statusText);
                },
                complete: function(){
                    $.loading().dismiss();
                }
            };

            function fadeContentNicely(onComplete, c){
                if(c == undefined)
                    c = $('#content');
                c.animate({
                    marginTop: '+=150px',
                    opacity: 0
                }, {
                    complete: onComplete
                });
            }

            $('.compact-page a.ajax').click(function(e){
                ajaxOptions.success = function(data){
                    var body = data.split('<body>')[1].split('</body>')[0];
                    var $body = $('<div>').html(body);

                    var $oldContent = $('#content');

                    if($body.find('.compact-page')[0]){
                        $('body').html(body);
                        $('#content').css({marginTop: '-=150px', opacity: 0}).animate({
                            marginTop: '+=150px',
                            opacity: 1
                        });
                        eventHistory.rebindAll();
                    }
                }

                $.ajax($(this).attr('href'), ajaxOptions);

                e.preventDefault();
            });

            $('.compact-page form.jmenu').bind('submit.jmenu', function(e){
                var $this = $(this);

                ajaxOptions.data = $this.serialize();
                ajaxOptions.type = $this.attr('method') ? $this.attr('method') : 'GET';
                var parent = ajaxOptions.beforeSend;
                ajaxOptions.beforeSend = function(jqXHR){
                    jqXHR.setRequestHeader('X-Requested-With', {toString: function(){ return ''; }})
                    parent();
                };
                ajaxOptions.success = function(data){
                    var body = data.split('<body>')[1].split('</body>')[0];
                    var $body = $('<div>').html(body);
                    var $nav = $body.find('#wrapper > header nav'), $newNav = $('<nav class="menu" />');

                    // if is the page we are wating for
                    if($nav[0]){
                        var $ul = $newNav.html('<ul></ul>').find('ul');

                        // format the menu
                        $nav.find('> ul > li').each(function(i, el){
                            var $li = $(el),
                                $a = $li.find('> a'),
                                $icon = $a.find('span'),
                                text = $.trim($a.text()),
                                $submenu = $li.find('.submenu'),
                                isSubmenu = $submenu[0]

                                $a.html('<div class="wrapIcon"></div><div class="wrapText"></div>').find('.wrapIcon').html($icon).end().find('.wrapText').html(text);
                                $li.html($a);
                                if(isSubmenu){
                                    $li.append($submenu).data('submenu', true);
                                }
                                $ul.append($li);
                        });

                        $('body').append($newNav).css('overflow', 'hidden');

                        var $logo = $('#logo').clone(),
                            $compact = $('.compact-page'),
                            $wrapper = $('#wrapper'),
                            perLine = 3,
                            liHeight = $newNav.find('li:first').height(),
                            liWidth = $newNav.find('li:first').width(),
                            totalLi = $newNav.find('> ul > li').size(),
                            numLines = Math.ceil(totalLi / perLine);

                        $compact.append($logo);
                        var logoHeight = $logo.find('img').height(),
                            logoWidth = $logo.find('img').width();
                        $logo.css('opacity', 0);
                        $compact.find('> div').remove();
                        $wrapper.append($logo).append($newNav);

                        var o = 0, top = 0, isLastLine = false;

                        // animate each one of the itens
                        $newNav.find('> ul > li').each(function(i, el){
                            var $li = $(el), mLeft, mTop;

                            if((i % perLine) == 0 && i != 0){
                                o = 0;
                                top++;
                            }
                            if(i > totalLi-perLine)
                                isLastLine = true;

                            $li.css({
                                position: 'absolute',
                                top: '50%',
                                left: '50%',
                                opacity: .5,
                                marginLeft: mLeft = (-((liWidth/2) * (perLine)) + (o * liWidth)),
                                marginTop: mTop = (-(liHeight/2 * numLines) + (top*liHeight))
                            });

                            var offset = $li.offset(), n = i % 2 == 0 ? -1 : 1;
                            $li.data('n', n);

                            $li.animate({
                                opacity: 1,
                                path : new $.path.bezier({
                                    start: {
                                        x: Math.floor(Math.random()*$(window).width()),
                                        y: Math.floor(Math.random()*$(window).height()),
                                        angle: 100
                                    },
                                    end: {
                                        x: offset.left+(mLeft)*-1,
                                        y: offset.top+(mTop)*-1,
                                        angle: -100
                                    }
                                })}, {
                                duration: 800,
                                complete: function(){
                                    $(this).css({top: '50%', left: '50%'});
                                    if(i == totalLi-1){
                                        $logo.css({position: 'absolute', top: '50%', left: '50%', marginLeft: -(logoWidth/2), marginTop: -(100 + logoHeight + (numLines*liHeight)/2)}).animate({opacity: 1, marginTop: '+=100'}, 300);
                                        $('body').trigger('jcomplete');
                                        eventHistory.rebindAll();
                                        //$newNav.find('> ul > li:has(.submenu) > a').click();
                                    }
                                }
                            });

                            $li.find('a').click(function(e){
                                var $a = $(this);
                                // do submenu
                                if($li.data('submenu')){
                                    var $back = $('<p class="center"><a href="#" class="jback">‹ back</a></p>'),
                                        oldTop = $logo.css('margin-top'),
                                        sub = $('<nav class="jsubmenu" />').append('<header><h2>' + $a.text() + '</h2></header>').append($li.find('.submenu').clone()).append($back);

                                    $back.click(function(e){
                                        fadeContentNicely(function(){
                                            sub.remove();
                                        }, sub);

                                        $newNav.find('> ul > li').each(function(){ $(this).css('margin-top', $(this).data('oldTop')).css({marginTop: '-=100px'}).show().animate({marginTop: '+=100px', opacity: 1}); })
                                        $logo.animate({marginTop: oldTop })
                                        e.preventDefault();
                                    });

                                    $('body').append(sub);
                                    var subWidth = sub.width(),
                                        subHeight = sub.height();

                                    $newNav.find('> ul > li').each(function(i){
                                        var $li = $(this), n = $li.data('n') < 1 ? '-' : '+', ni = $li.data('n') > -1 ? '-' : '+';
                                        $li.data('oldTop', $li.css('margin-top')).animate({marginTop: ni + '=100px', opacity: 0}, function(){ $(this).hide(); });
                                    });
                                    sub.css({opacity: 0, marginLeft: -(subWidth/2), marginTop: -(subHeight/2 + 100)}).animate({opacity: 1, marginTop: '+=100px'}, 'slow');
                                    $logo.animate({marginTop: -(logoHeight/2) - (subHeight/2) - 50 });
                                    eventHistory.rebindAll();
                                    e.preventDefault();
                                }
                            });

                            o++;
                        });
                        $('#content').animate({opacity: 1});
                    } else {
                        // if is not, submit the form normally
                        $this.unbind('submit.jmenu').submit();
                    }
                }

                $.ajax($this.attr('action'), ajaxOptions);

                e.preventDefault();
            });
        })();

        // sliders
        $('.slider').each(function(){
            var options = {},
                $this = $(this);

            if($this.is('.vertical'))
                options.orientation = 'vertical';

            if($this.is('.range')){
                options.range = true;
                options.values = [5, 25];
            }

            $this.slider(options);
        });

        // tooltip tipsy
        $('.tooltip').each(function(){
            var gravity = $(this).attr('data-position');

            if(!gravity)
                gravity = $.fn.tipsy.autoNS;

            $(this).tipsy({gravity: gravity, fade: true});
        });

        // progressbar
        (function(){
            $( ".progressbar" ).each(function(){
                var $this = $(this), options = {};

                $this.progressbar();

                if($this.attr('data-value')){
                    options.value = parseInt($this.attr('data-value'));
                    growTo(options.value, $this);
                }
            });

            function growTo(value, $progress){
                $progress.find('.ui-progressbar-value').show().animate({width: value + '%'}, {
                    duration: 1500,
                    complete: function(){
                        $progress.progressbar('option', 'value', value);
                    },
                    easing: 'easeOutBounce'
                });
            }
        })();

        // open link as modal
        $('.open-modal').click(function(e){
            var modal = $($(this).attr('href')).leanModal({closeButton: '.box .close'});
            e.preventDefault();
        });

        // modal
        $('.prettyPhoto').prettyPhoto({social_tools:false});

        // fixes
        $('.head .divider').before('<div class="clear">');

        $('.userlist li').click(function(){
            window.location.href = $(this).find('a').attr('href');
        });

        $('.miniColors-trigger').each(function(){
            var $this = $(this);
            if($this.prev().is('input[type=text]')){
                $this.prev().css('padding-right', 35);
                $this.css({position: 'relative', top: 6, left: -30});
            }
        });

        $('.table table:not(.datatable) tbody tr:nth-child(even)').addClass('even');
        $('.boxed-table table:not(.datatable) tbody tr:nth-child(even)').addClass('even');

        $('li:first-child, th:first-child').addClass('first');
        $('li:last-child, th:last-child').addClass('last');
        $('table.statistics tbody tr:last-child').addClass('last');

        /*============
            Box
        ==============*/
        // box tabs
        $('.box').each(function(){
            var $this = $(this)
            var currentActiveTab = $this.find('header nav li.active a').attr('href');
            $this.find('.tab:not(' + currentActiveTab + ')').hide();

            $this.find('header nav li a').click(function(e){
                var $self = $(this);
                if(!$self.is($('a[href=' + currentActiveTab + ']'))){
                    var cur = $(currentActiveTab);
                    var origHeight = cur.css('height');
                    cur.hide();
                    currentActiveTab = $self.attr('href');
                    cur = $(currentActiveTab);
                    var realHeight = cur.show().height(); cur.hide();
                    $self.closest('nav').find('li').removeClass('active').filter($self.parent()).addClass('active');


                    cur.show().css('opacity', 0).height(origHeight).animate({height: realHeight}, function(){
                        cur.height('auto').css('opacity', '1').hide().fadeIn();
                    });
                }
                e.preventDefault();
            });
        });

        // close
        $('.box header').on('click', '.close', function(e){
            var $box = $(this).closest('.box');

            if(!$box.is('.modal-window-hidden')){
                var $boxContent = $box.find('.box-content');
                if($boxContent.is(':visible')){
                    $boxContent.slideUp();
                    $box.toggleClass('closed');
                }else{
                    $boxContent.slideDown();
                    $box.toggleClass('closed');
                }
                e.preventDefault();
            }
        });

        /*============
            Notifications
        ==============*/
        // air
        $('.air').mouseenter(function(){
            $(this).stop(true, true).animate({opacity: 1});
        }).mouseleave(function(){
            $(this).animate({opacity: .85});
        });

        // close alert
        $('.alert .close').click(function(e){
            $(this).closest('.alert').slideUp(function(){
                $(this).remove();
            });
            e.preventDefault();
        });

        /*============
            Media
        ==============*/
        $('.gallery li').mouseenter(function(){
            $(this).find('.actions').animate({bottom: '-=20px'}, 'fast');
        }).mouseleave(function(){
            $(this).find('.actions').stop(true, true).animate({bottom: '+=20px'}, 'fast');
        });

        /*============
            DataTable
        ==============*/
        (function(){
            $.fn.wrapInnerTexts = function($with){
                if(!$with)
                    $with = '<span class="textnode">';

                $(this).each(function(){
                    var kids = this.childNodes;
                            for (var i=0,len=kids.length;i<len;i++){
                                if (kids[i].nodeName == '#text'){
                                    $(kids[i]).wrap($with);
                                }
                            }
                });
                return $(this);
            };

            var dataTableOptions = {
                sDom: '<"extension top fullwidth"lf>rt<"extension bottom inright pagination"p>',
                sPaginationType: 'full_numbers',
                fnInitComplete: function(t){
                    var $table = $(t.nTable),
                        $boxedTable = $table.parents('.boxed-table');

                    $table.find('.sorting, .sorting_asc, .sorting_desc').wrapInner($('<div class="parentsort" />')).find('.parentsort').append('<div class="sorticon" />');
                    $table.prev().find('.dataTables_length select').removeAttr('size').parent().wrapInnerTexts();
                    $table.prev().find('.dataTables_filter label').wrapInnerTexts();

                    if($boxedTable[0]){
                        // moves length input in box header
                        $boxedTable.find('header .inner .right').prepend($('<div class="per-page">').html('<label><span class="textnode">itens per page</span></label>').find('label').append($boxedTable.find('.dataTables_length select')).end());
                        // moves search input
                       $table.prev().find('.dataTables_filter input').addClass('right').attr('placeholder', 'Search').appendTo($boxedTable.find('.box .box-content .pane'));

                        // remove original div
                        $table.prev().remove();

                        // moves pagination to the right place
                        $boxedTable.find('.box').after($table.next());
                        $('th.checkbox, th.sorting_disabled').removeClass('sorting sorting_asc').unbind('click').removeAttr('role').find('.sorticon').remove();

                    }else{
                        $table.prev().append('<div class="clear">');
                    }
                }
            };

            $('.datatable:not(.five-per-page)').dataTable(dataTableOptions);

            // five itens per page
            dataTableOptions.aLengthMenu = [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]];
            dataTableOptions.iDisplayLength = 5;

            $('.datatable.five-per-page').dataTable(dataTableOptions);
        })();
    });
});

$(window).load(function(){
    setTimeout($.loading().dismiss, 500);
});

var eventHistory = (function(){
    var methods = {
        add: function(event){
            events.push(event);
            event();
            return methods;
        },
        rebindAll: function(){
            for(var i in events){
                events[i]();
            }
            return methods;
        }
    }, events = [];

    return methods;
})();
