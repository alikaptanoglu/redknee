var w = 0,
	body = $('body');

var resizeTimer,
	editClassTimer,
	focusTimer,
	formTimer,
	goTimer,
	toastTimer,
	modalTimer,
	modalCloseDelay,
	keyupTimer,
    hashPrev,
    loadTimer;

$(window).on('load', function (e) {
	w = $(window).width();

	resizeTimer = window.setTimeout(function() {
        body.removeClass('preloader-active')
    }, 400)

	windowReady(e)

    $('.load').each(function(i, el) {
        var _this = $(this);

        setTimeout(function() {
           json_ajax(_this, false);
        }, 100 + (i * 100));

    })

	initial()
}).on('scroll', function(e) {
    var st = $(this).scrollTop();

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
});

$(document).on('click', '.edit-class', function() {
    var _this = $(this);

    if (_this.hasClass('disabled'))
        return false;

    if (_this.data('remove'))
        $((_this.target == 'this')?_this:_this.data('target')).removeClass(_this.data('remove'))
    if (_this.data('toggle'))
        $((_this.target == 'this')?_this:_this.data('target')).toggleClass(_this.data('toggle'))
    if (_this.data('add'))
        $((_this.target == 'this')?_this:_this.data('target')).addClass(_this.data('add'))
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
}).on('click', 'a.ajax', function() {
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
    	c('Escape Key', 'warn');
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
                    })
                } else {
                    toast(msg, 2000)
                	modal({ 'heading': msg, 'body': jqXHR.responseText, 'class': 'col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1' })
                }

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
                            $((val.target == 'this')?_this:val.target).show()
                        else if (val.type == 'hide')
                            $((val.target == 'this')?_this:val.target).hide()
                        else if (val.type == 'remove')
                            $((val.target == 'this')?_this:val.target).remove()
                        else if (val.type == 'reset')
                            $((val.target == 'this')?_this:val.target)[0].reset()
                        else if (val.type == 'appendTo')
                            $((val.element == 'this')?_this:val.element).appendTo(val.target)
                        else if (val.type == 'prependTo')
                            $((val.element == 'this')?_this:val.element).prependTo(val.target)
                    })

                if (obj.html)
                    $.each(obj.html, function(key, val) {
                        var content = val.content;

                        if (val.escapeHTML)
                            content = escapeHTML(val.content);

                        if (val.type == 'dom')
                            $((val.target == 'this')?_this:val.target).html(content)
                        else if (val.type == 'append')
                            $((val.target == 'this')?_this:val.target).append(content)
                        else if (val.type == 'prepend')
                            $((val.target == 'this')?_this:val.target).prepend(content)
                        else if (val.type == 'before')
                            $((val.target == 'this')?_this:val.target).before(content)
                        else if (val.type == 'after')
                            $((val.target == 'this')?_this:val.target).after(content)
                        else if (val.type == 'value')
                            $((val.target == 'this')?_this:val.target).val(text)
                    })

                if (obj.editClass)
                    $.each(obj.editClass, function(key, val) {
                        if (val.remove)
                            $((val.target == 'this')?_this:val.target).removeClass(val.remove)
                        if (val.add)
                            $((val.target == 'this')?_this:val.target).addClass(val.add)
                    })

                if (obj.editCss)
                    $.each(obj.editCss, function(key, val) {
                        $((val.target == 'this')?_this:val.target).css(val.css[0])
                    })

                if (obj.load) {
                    window.clearTimeout(loadTimer);

                    loadTimer = window.setTimeout(function() {
                        json_ajax($((obj.load.target == 'this')?_this:obj.load.target));
                    }, obj.load.delay)
                }

                if (obj.modal)
                    modal(obj.modal)

                if (obj.pagination) {
                    var pagination = $('<ul/>', { 'class': 'pagination' });

                    if (parseInt(obj.pagination.current_page) > 3)
                        var page = parseInt(obj.pagination.current_page) - 1,
                            btn = $('<li/>').appendTo(pagination),
                            link = $('<a/>', { class: 'ripple', href: '#page-' + page, 'aria-label': 'Previous' }).appendTo(btn),
                            icon = $('<i/>', { 'aria-hidden': 'true', class: 'ion ion-ios-arrow-left' }).appendTo(link);

                    if (obj.pagination.total_page > 1)
                        for (var i = parseInt(obj.pagination.current_page)-3; i <= parseInt(obj.pagination.current_page)+3; i++) {
                            if (i >= 1 && i <= obj.pagination.total_page)
                                var btn = $('<li/>', { class: (i == obj.pagination.current_page) ? 'active' : '' }).appendTo(pagination),
                                    link = $('<a/>', { class: 'ripple', href: '#page-' + i, html: i }).appendTo(btn);
                        }

                    if (obj.pagination.total_page > parseInt(obj.pagination.current_page)+3)
                        var page = parseInt(obj.pagination.current_page) + 1,
                            btn = $('<li/>').appendTo(pagination),
                            link = $('<a/>', { class: 'ripple', href: '#page-' + page, 'aria-label': 'Next' }).appendTo(btn),
                            icon = $('<i/>', { 'aria-hidden': 'true', class: 'ion ion-ios-arrow-right' }).appendTo(link);

                    $(_this.data('pager')).html(pagination)
                }

            	body.removeClass('polling-active')
            	_this.removeClass('disabled wait')

                initial()
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
 
    time = window.setInterval(function () {
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
    $('.css').each(function() {
        var _this = $(this);

        if (_this.data('backgroundImage'))
            _this.css('backgroundImage', _this.data('backgroundImage'))
        if (_this.data('color'))
            _this.css('color', _this.data('color'))
        if (_this.data('backgroundColor'))
            _this.css('backgroundColor', _this.data('backgroundColor'))
    })

    autosize($('.autosize'))

    $('[data-toggle=tooltip]').tooltip()
    $('[data-toggle=popover]').popover()
    $('.masked').each(function() {
        var _this = $(this);

        _this.mask(_this.attr('data-format'), { placeholder: _this.attr('data-placeholder') });
    })
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

    if (windowWidth < 992)
        body.removeClass('drawer-active dock-active')
    else
    	body.addClass('drawer-active')
}