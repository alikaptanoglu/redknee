var root = '',
    development = true;

var instagram = {
        'userId': '2105600294',
        'accessToken': '2105600294.1677ed0.fafcd049ee1e44f99165eddf925b9534',
    },
    recaptcha = {
        'sitekey': '6LdMWA8UAAAAAN3RfoNHOD7Oo6f1SN2BKVR_vW6p'
    };

var w = 0,
	body = $('body'),
    lang = $('html').attr('lang');

var resizeTimer,
	editClassTimer,
	focusTimer,
	formTimer,
	goTimer,
	toastTimer,
	modalTimer,
	keyupTimer,
    loadTimer,
    carouselTimer;

var modalCloseDelay;
var hashPrev,
    gr = {};

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

    getScript('.instagram', [{ 'type': 'js', 'src': 'assets/js/instafeed.min.js' }], function(selector) {
        $(selector).each(function() {
            var _this = $(this),
                html = _this.html();

            if (html != '')
                $.extend(instagram, { 'template': html })

            var userFeed = new Instafeed($.extend(instagram, $(this).data())).run();
        })
    })

    getScript('#bubble', [{ 'type': 'js', 'src': 'assets/js/bubble.js' }], function() {})

    getScript('#snow', [{ 'type': 'js', 'src': 'assets/js/snow2.js' }], function() {
        snow.count = 30;   // number of flakes
        snow.delay = 20;   // timer interval
        snow.minSpeed = 2; // minimum movement/time slice
        snow.maxSpeed = 5; // maximum movement/time slice
        snow.start();
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
    var sp = dir.split('->'),
            _this,
            directory = '';

    $.each(sp, function(key, val) {
        if (_this) {
            var brackets = val.split(/[(\)]/);

            directory = directory + "." + brackets[0] + "('" + brackets[1] + "')";
        } else
            _this = val == 'this' ? '_this' : "$('" + val + "')";
    })

    return _this + directory;
}

function iClass(_this) {
    if (_this.hasClass('disabled'))
        return false;

    if (_this.data('remove'))
        eval(directory(_this.data('target'))).removeClass(_this.data('remove'))
    if (_this.data('toggle'))
        eval(directory(_this.data('target'))).toggleClass(_this.data('toggle'))
    if (_this.data('add'))
        eval(directory(_this.data('target'))).addClass(_this.data('add'))
}

$(document).on('click', '.click-class', function() {
    var _this = $(this);

    hidden(_this)
    iClass(_this)
}).on('click', '.click-value', function() {
    var _this = $(this);

    hidden(_this)

    var $this = eval(directory(_this.data('target')));

    if ($this.is('select'))
        $this.val(_this.data('value')).trigger('change')
    else
        $this.val(_this.data('value'))
}).on('blur', '.blur-class', function() {
    var _this = $(this);

    if (!_this.hasClass('blur-disabled')) iClass(_this)
}).on('click', '.focus, .focus-to', function() {
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
}).on('click', '.closes', function() {
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

    json_ajax(_this.data('load')?eval(directory(_this.data('load'))):_this);
}).on('keyup', '.keyup', function() {
    var _this = $(this);

    window.clearTimeout(keyupTimer);

    keyupTimer = window.setTimeout(function() {
        json_ajax(_this.data('target')?eval(directory(_this.data('target'))):_this);
    }, 500)

    return false;
}).on('change', '.change', function() {
    var _this = $(this),
        selected = _this.find("option:selected").val();

    if (_this.is('select') || _this.is('input'))
        json_ajax(_this.data('target')?eval(directory(_this.data('target'))):_this);
}).keyup(function(e) {
    if (e.keyCode == 27) {
    	body.removeClass('dock-active')
    } else if (e.keyCode == 13) {
    	c('Enter Key', 'warn');
    }
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
        body.addClass('polling-active');

        if (input[0].files && input[0].files[0]) {
            var extension = input[0].files[0].name.split('.').pop().toLowerCase();

            if (fileTypes['extensions'].indexOf(extension) > -1) {
                var filereader = new FileReader()
                    filereader.onload = function(e) {
                        if (_this.data('input'))
                            eval(directory(_this.data('input'))).val(e.target.result)
                        if (_this.data('img'))
                            eval(directory(_this.data('img'))).attr('src', e.target.result)

                        hidden(_this)
                        body.removeClass('polling-active');
                    }

                    filereader.readAsDataURL(input[0].files[0])
            } else {
                toast(fileTypes['alert'], 4000)

                body.removeClass('polling-active');
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
}).on('click', '.social-video', function() {
    var _this = $(this),
        iframe = _this.children('iframe');

    iframe.attr('src', iframe.data('src')).css({ 'visibility': 'visible' })
}).on('keydown, keyup', '.character-limit', function() {
    character_limit($(this))
}).on('click', '.geo-location', function() {
    var _this = $(this);

    body.addClass('polling-active');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var data_vars = [];

            $.each(_this.data(), function(key, val) {
                data_vars['data-' + key] = val;
            })

            var attributes = {
                    'data-type': 'geo',
                    'data-href': 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + ',' + position.coords.longitude + '&sensor=false'
                },
                element = $('<a />', $.extend(attributes, data_vars));

            json_ajax(element)
        }, function(error) {
            var msg = '';

            if (error.code) {
                if (error.PERMISSION_DENIED)
                    msg = 'User denied the request for Geolocation.';
                else if (error.POSITION_UNAVAILABLE)
                    msg = 'Location information is unavailable.';
                else if (error.TIMEOUT)
                    msg = 'The request to get user location timed out.';
                else if (error.UNKNOWN_ERROR)
                    msg = 'An unknown error occurred.';

                modal({
                    'body': msg,
                    'bodyClass': 'text-center',
                    'class': 'col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2'
                })
            }

            body.removeClass('polling-active');
        })
    } else {
        modal({
            'body': 'Sorry, your browser does not support geolocation services.',
            'bodyClass': 'text-center',
            'class': 'col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2'
        })

        body.removeClass('polling-active');
    }
}).on('click', '.click-toast', function() {
    var _this = $(this);

    toast(_this.data('text'), _this.data('timeout'))
})

function clear_hash() {
    window.history.pushState("", document.title, window.location.pathname);
}

function json_ajax(_this) {
	if (_this.hasClass('disabled'))
		return false;

    body.addClass('polling-active');
    _this.addClass('disabled wait');

    formTimer = window.setTimeout(function() {
    	var data_method = 'POST',
    		data_vars;

    	if (_this.is('form'))
            data_vars = $.extend(data_vars, getFormData(_this))
    	else if (_this.is('a'))
        	if (_this.data('token'))
            	data_method = 'POST';
            else
            	data_method = 'GET';

        if (_this.data('method'))
            data_method = _this.data('method').toUpperCase();

        data_vars = $.extend(data_vars, _this.data());

        if (_this.data('include')) {
            var items = _this.data('include').split(','),
                array = $("<div />");

            $.each(items, function(key, val) {
                var item = $('[name=' + val + ']');

                if (
                    item.attr('type') && (
                        (
                            item.attr('type') == 'text' ||
                            item.attr('type') == 'datetime' ||
                            item.attr('type') == 'datetime-local' ||
                            item.attr('type') == 'email' ||
                            item.attr('type') == 'month' ||
                            item.attr('type') == 'number' ||
                            item.attr('type') == 'range' ||
                            item.attr('type') == 'search' ||
                            item.attr('type') == 'tel' ||
                            item.attr('type') == 'time' ||
                            item.attr('type') == 'url' ||
                            item.attr('type') == 'week'
                        )
                    ) || (
                        item.is('textarea')
                    ) || (
                        item.is('select')
                    )
                ) {
                    array.data(val, item.val());
                } else if (
                    (
                        item.attr('type') == 'radio' ||
                        item.attr('type') == 'checkbox'
                    ) &&
                        item.prop('checked')
                ) {
                    $.each(item, function(key, val) {
                        if (item.prop('checked'))
                            c(1)
                    })
                }

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

        var URL = _this.is('form') ? _this.attr('action') : _this.data('href');

    	$.ajax({
            type: data_method,
            dataType: 'json',
            url: URL,
            data: (data_method == 'POST') ? data_vars : '',
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
                } else {
                    var posts = '';

                    $.each(data_vars, function(key, val) {
                        var input = $('[name="' + key + '"]');

                        posts = posts + '<li class="list-group-item">' + key + ': <strong>' + ((input.attr('type') == 'password') ? '[secret]' : val) + '</strong></li>';
                    })

                    if (development)
                    	modal({
                            'heading': 'Development Mode',
                            'body': '<div>' + 
                                    '   <label>Request URL:</label>' + 
                                    '   <input type="text" class="form-control" readonly value="' + data_method + ' : ' + URL + '" />' + 
                                    '</div>' + 
                                    '<div class="alert alert-info">' + 
                                    '   <ul class="list-group">' + posts + '</ul>' + 
                                    '</div>' + 
                                    '<h3 class="pdb-10">' + msg + '</h3>' + 
                                    '<div class="well">' + jqXHR.responseText + '</div>',
                            'class': 'col-lg-8 col-lg-offset-2 col-xs-10 col-xs-offset-1'
                        })
                    else
                        modal({
                            'body': msg,
                            'bodyClass': 'text-center',
                            'class': 'col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2'
                        })
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
                        setTimeout(function() {
                            if (val.type == 'show')
                                eval(directory(val.target)).show()
                            else if (val.type == 'hide')
                                eval(directory(val.target)).hide()
                            else if (val.type == 'remove')
                                eval(directory(val.target)).remove()
                            else if (val.type == 'reset')
                                eval(directory(val.target))[0].reset()
                            else if (val.type == 'appendTo')
                                eval(directory(val.element)).appendTo(val.target)
                            else if (val.type == 'prependTo')
                                eval(directory(val.element)).prependTo(val.target)
                        }, val.delay)
                    })
                if (obj.html)
                    $.each(obj.html, function(key, val) {
                        setTimeout(function() {
                            var content = val.content;

                            if (val.escapeHTML)
                                content = escapeHTML(val.content);

                            if (val.type == 'dom')
                                eval(directory(val.target)).html(content)
                            else if (val.type == 'append')
                                eval(directory(val.target)).append(content)
                            else if (val.type == 'prepend')
                                eval(directory(val.target)).prepend(content)
                            else if (val.type == 'before')
                                eval(directory(val.target)).before(content)
                            else if (val.type == 'after')
                                eval(directory(val.target)).after(content)
                            else if (val.type == 'value') {
                                var $this = eval(directory(val.target));

                                if ($this.is('select'))
                                    $this.val(val.text).trigger('change')
                                else
                                    $this.val(val.text)
                            } else if (val.type == 'focus')
                                eval(directory(val.target)).focus()
                        }, val.delay)
                    })

                if (obj.editClass)
                    $.each(obj.editClass, function(key, val) {
                        if (val.remove)
                            setTimeout(function() {
                                eval(directory(val.target)).removeClass(val.remove)
                            }, val.addDelay)
                        if (val.add)
                            setTimeout(function() {
                                eval(directory(val.target)).addClass(val.add)
                            }, val.removeDelay)
                    })

                if (obj.editCss)
                    $.each(obj.editCss, function(key, val) {
                        setTimeout(function() {
                            eval(directory(val.target)).css(val.css[0])
                        }, val.delay)
                    })

                if (obj.load) {
                    window.clearTimeout(loadTimer);

                    loadTimer = window.setTimeout(function() {
                        json_ajax(eval(directory(obj.load.target)));
                    }, obj.load.delay)
                }

                if (obj.modal)
                    modal(obj.modal)

                if (_this.data('type') == 'geo') {
                    if (obj.status == 'OK') {
                        var loc = obj.results[0];

                        eval(directory(_this.data('location'))).val(loc.formatted_address)
                        eval(directory(_this.data('coords'))).val(loc.geometry.location.lat + ',' + loc.geometry.location.lng)

                        hidden(_this)

                        body.removeClass('polling-active')
                    }
                }

                if (obj.pagination && _this.data('pager')) {
                    setTimeout(function() {
                    var pagination = $('<ul/>', { 'class': 'pagination' });

                    if (parseInt(obj.pagination.current_page) > 3) 
                        var page = parseInt(obj.pagination.current_page) - 1,
                            btn = $('<li/>').appendTo(pagination),
                            link = $('<a/>', { class: 'ripple btn btn-default', href: '#page-' + page, 'aria-label': 'Previous' }).appendTo(btn),
                            icon = $('<i/>', { 'aria-hidden': 'true', class: 'ion ion-ios-arrow-left' }).appendTo(link);

                    if (obj.pagination.total_page > 1)
                        for (var i = parseInt(obj.pagination.current_page)-3; i <= parseInt(obj.pagination.current_page)+3; i++) {
                            if (i >= 1 && i <= obj.pagination.total_page)
                                var btn = $('<li/>').appendTo(pagination),
                                    link = $('<a/>', { class: 'ripple btn btn-default', href: '#page-' + i, html: i }).appendTo(btn);
                            if (i == obj.pagination.current_page) link.addClass('active')
                        }

                    if (obj.pagination.total_page > parseInt(obj.pagination.current_page)+3)
                        var page = parseInt(obj.pagination.current_page) + 1,
                            btn = $('<li/>').appendTo(pagination),
                            link = $('<a/>', { class: 'ripple btn btn-default', href: '#page-' + page, 'aria-label': 'Next' }).appendTo(btn),
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
                        if (eval(directory(pager)).hasClass('load-more')) {
                            var next = obj.pagination.current_page >= obj.pagination.total_page ? obj.pagination.current_page : parseInt(obj.pagination.current_page) + 1,
                                div = $('<div/>', {
                                    'class': 'text-center'
                                }),
                                btn = $('<a/>', {
                                    'href': '#page-' + next,
                                    'class': 'btn btn-default btn-mr ripple',
                                    'html': eval(directory(pager)).data('text')
                                }).appendTo(div);

                            if (obj.pagination.current_page >= obj.pagination.total_page)
                                eval(directory(pager)).addClass('hidden')
                            else
                                eval(directory(pager)).html(div).removeClass('hidden')
                        } else
                            eval(directory(pager)).html(pagination)
                    }, obj.pagination.delay)
                }

                if (obj.scrollTo) {
                    var element = eval(directory(obj.scrollTo.element));

                    if ($(element).length) {
                        var offset = $(element).offset();

                        setTimeout(function() {
                            $('html, body').animate({ scrollTop: (obj.scrollTo.tolerance) ? offset.top + parseInt(obj.scrollTo.tolerance): offset.top }, 500);
                        }, obj.scrollTo.delay)
                    } else
                        c(element + ' is not found!', 'warn');
                }

                if (obj.run)
                    $.each(obj.run, function(key, val) {
                        eval(val);
                    })

                if (obj.captchaReset) {
                    if (obj.captchaReset == '--all--') {
                        $('.captcha').each(function() {
                            grecaptcha.reset(gr['gr-' + $(this).data('id')])
                        })
                    } else
                    grecaptcha.reset(gr['gr-' + obj.captchaReset])
                }

            	body.removeClass('polling-active')
            	_this.removeClass('disabled wait')

                setTimeout(function() {
                    initial()
                }, 100)

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

function hidden(_this) {
    if (_this.data('hidden')) {
        var hid = _this.data('hidden').split('|'),
            element = eval(directory(hid[0]));

        if (hid[1] == 'add')
            element.addClass('hidden')
        else if (hid[1] == 'remove')
            element.removeClass('hidden')
    }
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

function captcha() {
    var _this = $(this),
        re = $('<div />', {
            'id': _this.data('id'),
            'class': 'g-recaptcha'
        });

    if (_this.html() == '') {
        _this.html(re);

        setTimeout(function() {
            gr['gr-' + _this.data('id')] = grecaptcha.render(_this.data('id'), {
                'sitekey': recaptcha['sitekey']
            })
        }, 200)
    }
}

function initial() {
    $('[data-toggle=tooltip]').tooltip()
    $('[data-toggle=popover]').popover()

    getScript('.maskedInput', [{ 'type': 'js', 'src': 'assets/js/maskedinput.min.js' }], function(selector) {
        $(selector).each(function() {
            var _this = $(this);

            _this.mask(_this.attr('data-format'), { placeholder: _this.attr('data-placeholder') });
        })
    })

    getScript('.autosize', [{ 'type': 'js', 'src': 'assets/js/autosize.min.js' }], function(selector) {
        autosize($(selector))
    })

    getScript('.countdown', [{ 'type': 'js', 'src': 'assets/js/countdown.min.js' }], function(selector) {
        $(selector).each(function() {
            var _this = $(this);

            _this.countdown(_this.data('deadline'), function(e) {
                _this.text(e.strftime(_this.data('print')));
            })
        })
    })

    getScript('.captcha', [{ 'type': 'js', 'src': 'https://www.google.com/recaptcha/api.js?render=explicit' }], function(selector) {
        $(selector).each(captcha)
    })

    $('.carousel').carousel()
    $('.carousel > .carousel-indicators > li').on('mouseover', function() {
        var _this = $(this);

        window.clearTimeout(carouselTimer)

        carouselTimer = window.setTimeout(function() {
            _this.trigger('click')
        }, 500)
    })

    initSwitch()

    $('.social-video').each(function() {
        var _this = $(this);

        _this.css({
            'background-image': 'url(assets/img/play.svg),' + 
                                'url(assets/img/overlay.svg),' + 
                                'url(' + _this.children('iframe').data('img') + ')'
        })
    })

    $('.character-limit').each(function() {
        character_limit($(this))
    })

    getScript('.selectpicker', [
        { 'type': 'js', 'src': 'assets/js/bootstrap-select.min.js' },
        { 'type': 'js', 'src': 'assets/js/locales/bootstrap-select/defaults-' + lang + '.js' },
        { 'type': 'css', 'src': 'assets/css/bootstrap-select.min.css' }
    ], function(selector) {
        $(selector).selectpicker()
    })
}

function character_limit(_this) {
    var limit = parseInt(_this.data('limit')) - _this.val().length,
        indicator = $(eval(directory(_this.data('indicator'))));

    (limit < 20) ? indicator.addClass('text-danger') : indicator.removeClass('text-danger')

    indicator.html(limit)
}

function getScript(selector, files, func) {
    var obj = $(selector);

    if (obj.length > 0) {
        var file_count = files.length;

        $.each(files, function(key, obj) {
            var file_url = (obj['src'].substring(0, 4) == 'http') ? obj['src'] : root + obj['src'];

            if (obj['type'] == 'js') {
                var count = $('script[src=\'' + obj['src'] + '\']').length;

                if (!count)
                    $('<script />', {
                        'src': file_url,
                        'async': '',
                        'defer': ''
                    }).appendTo('body');
            } else if (obj['type'] == 'css') {
                var count = $('link[href=\'' + obj['src'] + '\']').length;

                if (!count)
                    $('<link />', {
                        'href': file_url,
                        'rel': 'stylesheet'
                    }).appendTo('head');
            }
        })

        setTimeout(function() {
            func(selector)
        }, 100)
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
		(obj.bodyClass) ? panel.children('.panel-body').removeClass().addClass('panel-body ' + obj.bodyClass) : panel.children('.panel-body').removeClass().addClass('panel-body');
	
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