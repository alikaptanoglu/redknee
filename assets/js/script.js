var root = '',
    instagram = {
        'userId': '2105600294',
        'accessToken': '2105600294.1677ed0.fafcd049ee1e44f99165eddf925b9534',
    };

var w = 0,
	body = $('body');

var resizeTimer,
	editClassTimer,
	focusTimer,
	formTimer,
	goTimer,
	toastTimer,
	modalTimer,
	keyupTimer,
    loadTimer;

var modalCloseDelay;
var hashPrev;

$(window).on('load', function (e) {
	w = $(window).width();

	resizeTimer = window.setTimeout(function() {
        body.removeClass('preloader-active')
    }, 400)

	windowReady(e)

    $('.load').each(function(i, el) {
        var _this = $(this);

        setTimeout(function() {
           json_ajax(_this);
        }, 100 + (i * 100));

    })

    getScript('.instagram', 'assets/js/instafeed.min.js', function(selector) {
        $(selector).each(function() {
            var _this = $(this),
                html = _this.html();

            if (html != '')
                $.extend(instagram, { 'template': html })

            var userFeed = new Instafeed($.extend(instagram, $(this).data())).run();
        })
    })

	initial()
}).on('scroll', function(e) {
    var st = $(this).scrollTop(),
        header = $('.header-opacity');

    if (!header.hasClass('lock'))
        (st > 164) ? header.addClass('active') : header.removeClass('active');
    (st > 800) ? body.addClass('top-active') : body.removeClass('top-active');
}).on('resize', function(e) {
    if ($(window).width() != w) {
        body.addClass('preloader-active')
        windowReady(e)

        resizeTimer = window.setTimeout(function() {
            body.removeClass('preloader-active')
        }, 400)
    }

    w = $(window).width();
})

function directory(dir) {
    if ($.type(dir) == 'object') {
        return dir;
    } else {
        var sp = dir.split('->'),
                _this,
                directory = '';

        $.each(sp, function(key, val) {
            if (_this) {
                var brackets = val.split(/[(\)]/);

                directory = directory + "." + brackets[0] + "('" + brackets[1] + "')";
            } else
                _this = "$(" + (val == 'this' ? this : "'" + val + "'" ) + ")";
        })

        return eval(_this + directory);
    }
}

$(document).on('click', '.edit-class', function() {
    var _this = $(this);

    if (_this.hasClass('disabled'))
        return false;

    if (_this.data('remove'))
        (_this.data('target') == 'this'?_this:directory(_this.data('target'))).removeClass(_this.data('remove'))
    if (_this.data('toggle'))
        (_this.data('target') == 'this'?_this:directory(_this.data('target'))).toggleClass(_this.data('toggle'))
    if (_this.data('add'))
        (_this.data('target') == 'this'?_this:directory(_this.data('target'))).addClass(_this.data('add'))
}).on('click', '.focus', function() {
	var _this = $(this);

	if (!_this.hasClass('disabled')) {
		window.clearTimeout(focusTimer);

		focusTimer = window.setTimeout(function() {
			$(_this.data('focus')).focus()
		}, 500)
	}
}).on('click', 'a', function(e) {
	var _this = $(this),
	    data = _this.data();

    if (_this.hasClass('disabled'))
        return false;

	if (_this.attr('href') == '#')
		e.preventDefault()
	else if (_this.attr('href') == '#top') {
		$('html, body').animate({ scrollTop: 0 }, 500);

		e.preventDefault()
	}
}).on('click', '.closes', function(e) {
	var _this = $(this);

	if (_this.data('target'))
		$(_this.data('target')).hide()
	else
		_this.hide()
}).on('submit', 'form.ajax', function() {
	json_ajax($(this));

    return false;
}).on('click', 'a.ajax, button.ajax', function() {
    var _this = $(this);

    if (_this.data('load'))
	   json_ajax($(_this.data('load')));
    else
        json_ajax(_this);
}).on('keyup', '.keyup', function() {
    var _this = $(this);

    window.clearTimeout(keyupTimer);

    keyupTimer = window.setTimeout(function() {
        json_ajax(_this);
    }, 500)

    return false;
}).on('change', '.change', function() {
    var _this = $(this);

    json_ajax(_this);
}).keyup(function(e) {
    if (e.keyCode == 27) {
    	body.removeClass('drawer-active dock-active')
    } else if (e.keyCode == 13) {
    	c('Enter Key', 'warn');
    }
}).on('mouseup', '.ripple', function (event) {
    var _this = $(this),
        div = $('<div/>', { class: 'ripple-effect' }),
        btnOffset = _this.offset(),
        xPos = event.pageX - btnOffset.left,
        yPos = event.pageY - btnOffset.top,
        ripple = $(".ripple-effect");

    event.preventDefault();

    ripple.css({
        "width": _this.height(),
        "height": _this.height()
    });

    div.css({
        "top": yPos - (ripple.height()/2),
        "left": xPos - (ripple.width()/2)
    }).appendTo(_this);

    window.setTimeout(function(){
        div.remove();
    }, 500);
}).on('click', '.upload-base64', function() {
    var _this = $(this),
        input = $('<input/>', { type: 'file' }),
        fileTypes = { 'extensions': [ 'jpg', 'jpeg', 'png' ], 'alert': 'Only image files!' };

    if (_this.data('extensions'))
        fileTypes['extensions'] = _this.data('extensions').split(',');
    if (_this.data('alert'))
        fileTypes['alert'] = _this.data('alert');

    input.click()
    input.on('change', function() {
        if (input[0].files && input[0].files[0]) {
            var extension = input[0].files[0].name.split('.').pop().toLowerCase();

            if (fileTypes['extensions'].indexOf(extension) > -1) {
                var filereader = new FileReader()
                    filereader.onload = function(e) {
                        if (_this.data('input'))
                            $(_this.data('input')).val(e.target.result)
                        if (_this.data('img'))
                            $(_this.data('img')).attr('src', e.target.result)
                    }

                    filereader.readAsDataURL(input[0].files[0])
            } else {
                toast(fileTypes['alert'], 4000)
            }
        }
    })
}).on('click', '.write', function() {
    var _this = $(this),
        target = $(_this.data('target'));

    if (target.is('input') || target.is('textarea'))
        target.val(_this.data('text'))
    else
        target.html(_this.data('text'))
}).on('focus, click', '.error > .form-control', function() {
    $(this).parent('.error').removeClass('active')
}).on('click', '.switch', function() {
    var _this = $(this);

    if (!_this.hasClass('disabled')) {
        if (_this.data('type') == 'radio')
            $('input[name=' + _this.data('name') + ']').parent('.switch').removeClass('active')

        _this.hasClass('active') ? _this.removeClass('active') : _this.addClass('active')
        _this.children('input').prop('checked', _this.hasClass('active') ? true : false)
    }
})

function json_ajax(_this) {
	if (_this.hasClass('disabled'))
		return false;

    body.addClass('polling-active');
    _this.addClass('disabled wait');

    formTimer = window.setTimeout(function() {
    	var data_type = 'POST',
    		data_vars;

    	if (_this.is('form'))
            data_vars = $.extend(data_vars, getFormData(_this))
    	else if (_this.is('a'))
        	if (_this.data('token'))
            	data_type = 'POST';
            else
            	data_type = 'GET';

        if (_this.data('type'))
            data_type = _this.data('type');

        data_vars = $.extend(data_vars, _this.data());

        if (_this.data('include')) {
            var items = _this.data('include').split(','),
                array = $("<div />");

            $.each(items, function(key, val) {
                array.data(val, $('[name=' + val + ']').val());

                data_vars = $.extend(data_vars, array.data());
            })

            delete data_vars["include"];
        }

        if (_this.data('pager')) {
            var hash = window.location.hash.replace("#", "").split("-"),
                page = 1;

            if ($.isNumeric(hash[1]) && hash[0] == 'page')
                page = hash[1];

            hashchange(function(id) {
                var id = id.split('-');

                if ($.isNumeric(id[1]) && id[0] == 'page')
                    json_ajax(_this);
            })

            data_vars = $.extend(data_vars, { "page": page });

            hashPrev = "page-" + page;
        }

    	$.ajax({
            type: data_type,
            dataType: 'json',
            url: _this.is('form') ? _this.attr('action') : _this.data('href'),
            data: (data_type == 'POST') ? data_vars : '',
            error: function(jqXHR, exception) {
            	var msg = '';

            	if (jqXHR.status === 0)
                    msg = 'Not connect.\n Verify Network.';
                else if (jqXHR.status == 404)
                    msg = 'Requested page not found. [404]';
                else if (jqXHR.status == 500)
                    msg = 'Internal Server Error [500].';
                else if (exception === 'parsererror')
                    msg = 'Requested JSON parse failed.';
                else if (exception === 'timeout')
                    msg = 'Time out error.';
                else if (exception === 'abort')
                    msg = 'Ajax request aborted.';
                else if (jqXHR.status == 422)
                	msg = 422;
                else
                    msg = 'Uncaught Error.';

                if (msg == 422) {
                    _this.next('.after-form-errors').remove();
                    _this.after($('<div/>', { class: 'alert alert-danger after-form-errors closes' })).appendTo();

                    $('<ul/>', { class: 'list-group' }).appendTo('.after-form-errors');

                    $.each($.parseJSON(jqXHR.responseText), function(key, val) {
                        $('<li/>', { class: 'list-group-item', html: val }).appendTo('.after-form-errors > .list-group');

                        var element = $('[name=' + key + ']');

                        if (element.parent('.error')) {
                            element.parent('.error').addClass('active').children('.error-text').html(val[0])

                            _this.next('.after-form-errors').remove();
                        }
                    })

                } else
                	modal({ 'body': '<div class="text-danger"><i class="ion ion-fw ion-information"></i> ' + msg + '</div>', 'class': 'col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1 col-lg-2 col-lg-offset-5' })

                body.removeClass('polling-active');
                _this.removeClass('disabled wait');
            },
            success: function(obj) {
            	if (obj.go) {
                    window.clearTimeout(goTimer);

                    goTimer = window.setTimeout(function() {
                        location.href = obj.go.url;
                    }, obj.go.delay)
                }

                if (obj.toast)
                    toast(obj.toast.text, obj.toast.timeOut)

                if (obj.dom)
                    $.each(obj.dom, function(key, val) {
                        if (val.type == 'show')
                            (val.target == 'this'?_this:directory(val.target)).show()
                        else if (val.type == 'hide')
                            (val.target == 'this'?_this:directory(val.target)).hide()
                        else if (val.type == 'remove')
                            (val.target == 'this'?_this:directory(val.target)).remove()
                        else if (val.type == 'reset')
                            (val.target == 'this'?_this[0]:directory(val.target)[0]).reset()
                        else if (val.type == 'appendTo')
                            (val.element == 'this'?_this:directory(val.element)).appendTo(val.target)
                        else if (val.type == 'prependTo')
                            (val.element == 'this'?_this:directory(val.element)).prependTo(val.target)

                    })
                if (obj.html)
                    $.each(obj.html, function(key, val) {
                        var content = val.content;

                        if (val.escapeHTML)
                            content = escapeHTML(val.content);

                        if (val.type == 'dom')
                            (val.target == 'this'?_this:directory(val.target)).html(content)
                        else if (val.type == 'append')
                            (val.target == 'this'?_this:directory(val.target)).append(content)
                        else if (val.type == 'prepend')
                            (val.target == 'this'?_this:directory(val.target)).prepend(content)
                        else if (val.type == 'before')
                            (val.target == 'this'?_this:directory(val.target)).before(content)
                        else if (val.type == 'after')
                            (val.target == 'this'?_this:directory(val.target)).after(content)
                        else if (val.type == 'value') {
                            var $this = (val.target == 'this'?_this:directory(val.target));

                            if ($this.is('select'))
                                $this.val(val.text).trigger('change');
                            else
                                $this.val(val.text);
                        } else if (val.type == 'focus')
                            (val.target == 'this'?_this:directory(val.target)).focus()
                    })

                if (obj.editClass)
                    $.each(obj.editClass, function(key, val) {
                        if (val.remove)
                            (val.target == 'this'?_this:directory(val.target)).removeClass(val.remove)
                        if (val.add)
                            (val.target == 'this'?_this:directory(val.target)).addClass(val.add)
                    })

                if (obj.editCss)
                    $.each(obj.editCss, function(key, val) {
                        (val.target == 'this'?_this:directory(val.target)).css(val.css[0])
                    })

                if (obj.load) {
                    window.clearTimeout(loadTimer);

                    loadTimer = window.setTimeout(function() {
                        json_ajax((obj.load.target == 'this'?_this:directory(obj.load.target)));
                    }, obj.load.delay)
                }

                if (obj.modal)
                    modal(obj.modal)

                if (obj.pagination) {
                    var pagination = $('<ul/>', { 'class': 'pagination' });

                    if (parseInt(obj.pagination.current_page) > 3) 
                        var page = parseInt(obj.pagination.current_page) - 1,
                            btn = $('<li/>').appendTo(pagination),
                            link = $('<a/>', { class: 'ripple btn btn-info', href: '#page-' + page, 'aria-label': 'Previous' }).appendTo(btn),
                            icon = $('<i/>', { 'aria-hidden': 'true', class: 'ion ion-ios-arrow-left' }).appendTo(link);

                    if (obj.pagination.total_page > 1)
                        for (var i = parseInt(obj.pagination.current_page)-3; i <= parseInt(obj.pagination.current_page)+3; i++) {
                            if (i >= 1 && i <= obj.pagination.total_page)
                                var btn = $('<li/>').appendTo(pagination),
                                    link = $('<a/>', { class: 'ripple btn btn-info', href: '#page-' + i, html: i }).appendTo(btn);
                            if (i == obj.pagination.current_page) link.addClass('active')
                        }

                    if (obj.pagination.total_page > parseInt(obj.pagination.current_page)+3)
                        var page = parseInt(obj.pagination.current_page) + 1,
                            btn = $('<li/>').appendTo(pagination),
                            link = $('<a/>', { class: 'ripple btn btn-info', href: '#page-' + page, 'aria-label': 'Next' }).appendTo(btn),
                            icon = $('<i/>', { 'aria-hidden': 'true', class: 'ion ion-ios-arrow-right' }).appendTo(link);

                    var pager = _this.data('pager');

                    if (pager == 'lazy') {
                        $(window).scroll(function() {
                           if ($(window).scrollTop() + $(window).height() > $(document).height() - 1) {
                                var next = obj.pagination.current_page >= obj.pagination.total_page ? obj.pagination.current_page : parseInt(obj.pagination.current_page) + 1;

                                window.location.hash = 'page-' + next;
                           }
                        })
                    } else
                        if ($(pager).hasClass('load-more')) {
                            var next = obj.pagination.current_page >= obj.pagination.total_page ? obj.pagination.current_page : parseInt(obj.pagination.current_page) + 1,
                                div = $('<div/>', {
                                    'class': 'text-center'
                                }),
                                btn = $('<a/>', {
                                    'href': '#page-' + next,
                                    'class': 'btn btn-default rotate rotate-180 ripple',
                                    'html': '<i class="ion ion-2x ion-fw ion-refresh"></i>'
                                }).appendTo(div);

                            if (obj.pagination.current_page >= obj.pagination.total_page)
                                $(pager).addClass('hidden')
                            else
                                $(pager).html(div).removeClass('hidden')
                        } else
                            $(pager).html(pagination)
                }

                if (obj.scrollTo) {
                    var element = obj.scrollTo.element;

                    if ($(element).length) {
                        var offset = $(element).offset();

                        $('html, body').animate({ scrollTop: (obj.scrollTo.tolerance) ? offset.top + parseInt(obj.scrollTo.tolerance): offset.top }, 500);
                    } else
                        c(element + ' is not found!', 'warn');
                }

                if (obj.run)
                    $.each(obj.run, function(key, val) {
                        eval(val);
                    })

            	body.removeClass('polling-active')
            	_this.removeClass('disabled wait')

                initial()

                _this.find('.error').removeClass('active')
            }
         })
    }, 200)
}

/* Escape HTML */
function escapeHTML(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;',
        "\\": ''
    };

    return text.replace(/[&<>\\"']/g, function(m) { return map[m]; });
}

/* Hash Change */
function hashchange(callback) {
    var hash = '',
        url = window.location.href.split('#')[1],
        time;
 
    time = window.setInterval(function() {
        hash = (window.location.href.split('#')[1] || '');

        if ((hashPrev !== hash) && (hash.length > 1)) {
            window.clearInterval(time);

            hashPrev = hash;

            if (callback) callback(hash);

            hashchange(callback);
        } 
    }, 100);
}

function initial() {
    $('[data-toggle=tooltip]').tooltip()
    $('[data-toggle=popover]').popover()

    getScript('.maskedInput', 'assets/js/maskedinput.min.js', function(selector) {
        $(selector).each(function() {
            var _this = $(this);

            _this.mask(_this.attr('data-format'), { placeholder: _this.attr('data-placeholder') });
        })
    })

    getScript('.autosize', 'assets/js/autosize.min.js', function(selector) {
        autosize($(selector))
    })

    getScript('.countdown', 'assets/js/countdown.min.js', function(selector) {
        $(selector).each(function() {
            var _this = $(this);

            _this.countdown(_this.data('deadline'), function(e) {
                _this.text(e.strftime(_this.data('print')));
            })
        })
    })

    $('.carousel').carousel()

    initSwitch()
}

function getScript(selector, file, func) {
    var obj = $(selector);

    if (obj.length > 0) {
        if (obj.data('load'))
            func(selector)
        else {
            $.ajaxSetup({
                cache: true
            })

            $.getScript(root + file, function() {
                func(selector)
            })
        }

        obj.data('load', 'loaded')
    }
}

/* Console Log */
function c(t, type) {
	if (type == 'warn')
		console.warn(t);
	else if (type == 'alert')
		alert(t);
	else
		console.log(t);
}

function toast(text, timeOut) {
	var toast = $('.toast');

	toast.fadeIn(100).children('.toast-content').html(text);

	if (timeOut) {
		window.clearTimeout(toastTimer);

		toastTimer = window.setTimeout(function() {
			toast.fadeOut(100);
		}, timeOut);
	}
}

function getFormData($form) {
    var unindexed_array = $form.serializeArray(),
        indexed_array = {},
        ii = 0;

    $.map(unindexed_array, function(n, i) {

        if (n['name'].indexOf("[]") > 0) {
            indexed_array[n['name'].replace('[]', '[' + ii + ']')] = n['value'];

            ii++;
        } else
            indexed_array[n['name']] = n['value'];
    })

    return indexed_array;
}

function modal(obj) {
	var panel = $('.modal').children('.panel');

	window.clearTimeout(modalTimer);
    window.clearTimeout(modalCloseDelay);
    window.clearTimeout(goTimer);

    modalTimer = window.setTimeout(function() {
		(obj.heading) ? panel.children('.panel-heading').html(obj.heading).show() : panel.children('.panel-heading').html('');
        (obj.body) ? panel.children('.panel-body').html(obj.body).show() : panel.children('.panel-body').hide();
		(obj.footer) ? panel.children('.panel-footer').html(obj.footer).show() : panel.children('.panel-footer').hide();
		(obj.close == false) ? panel.children('.panel-close').hide() : panel.children('.panel-close').show();
        (obj.class) ? panel.removeClass().addClass('panel panel-material ' + obj.class) : '';
		(obj.bodyClass) ? panel.children('.panel-body').removeClass().addClass('panel-body ' + obj.bodyClass) : panel.children('.panel-body').removeClass('gray');
	
		if (obj.closeDelay) {
            window.clearTimeout(modalCloseDelay);

            modalCloseDelay = window.setTimeout(function() {
                $('body').removeClass('modal-active');
            }, obj.closeDelay)
        }

        body.addClass('modal-active');
	}, (obj.delay) ? obj.delay : 0)
}

function windowReady() {
    var windowWidth = $(window).width();

    if (!body.hasClass('wide'))
        if (windowWidth < 992)
            body.removeClass('drawer-active dock-active')
        else
        	body.addClass('drawer-active')
}

function initSwitch() {
    $('.switch').each(function() {
        var _this = $(this);

        if (_this.children('input[name=' + _this.data('name') + ']').length == 0)
            _this.append($('<input />', {
                'type': _this.data('type') == 'checkbox' ? 'checkbox' : 'radio',
                'class': 'hidden',
                'value': _this.data('value'),
                'name': _this.data('name'),
                'id': _this.data('id')
            }).prop('checked', _this.hasClass('active')?true:false))
    })
}