var focusTimer,
    resizeTimer,
    readyTimer,
    formTimer,
    goTimer,
    modalTimer,
    modalCloseDelay,
    toastTimer,
    targetTimer,
    cssTargetTimer,
    classTargetTimer,
    pollingLoop,
    polling = $('.polling');

$(document).ready(function(e) {
	$('[data-toggle="tooltip"]').tooltip()

	$('.bg').each(function() {
		var data = $(this).data();

		$(this).css({
			'background-image': 'url(' + data.imagesrc + ')',
			'background-color': data.bgcolor,
			'color': data.color
		})
	})
}).on('click', '.toast', function() {
	window.clearTimeout(toastTimer);

	$(this).fadeOut(100);
}).on('click', 'a', function(e) {
	var _this = $(this),
	    data = _this.data();

    if (_this.hasClass('disabled'))
        return false;

	if (_this.hasClass('toggle-class')) {
		if (data.remove != undefined)
			$(data.target).removeClass(data.remove);

		if (data.add != undefined)
			setTimeout(function() {
				$(data.target).addClass(data.add);
			}, 100)
	}

	if (_this.hasClass('focus')) {
		window.clearTimeout(focusTimer);

		focusTimer = window.setTimeout(function() {
			$(data.focus).focus();
		}, 500)
	}

	if (_this.hasClass('modal-open')) {
		modal(_this.data('url'));

		e.preventDefault()
	}

	if (_this.attr('href') == '#')
		e.preventDefault()
	else if (_this.attr('href') == '#top') {
		$("html, body").animate({ scrollTop: 0 }, 500);

		e.preventDefault()
	}
}).keyup(function(e) {
    if (e.keyCode == 27) {
    	c('Escape Key', 'warn');
    } else if (e.keyCode == 13) {
    	c('Enter Key', 'warn');
    }
}).on('submit', 'form.ajax', function() {
    json_ajax($(this));

    return false;
}).on('click', 'a.ajax', function() {
    json_ajax($(this));

    return false;
}).on('click', '.spoiler', function() {
    $(this).children('.content').slideToggle(200);
})

function json_ajax(_this) {
    polling.addClass('active');

    var optional_data;

    if (_this.is('form')) {
        _this.css('opacity', '.5')
             .find('button[type=submit]')
             .attr('disabled', true)
             .addClass('disabled')
             .css('cursor', 'wait');

        optional_data = $.extend({}, _this.data(), getFormData(_this));
    } else if (_this.is('a')) {
        _this.css('opacity', '.5')
             .addClass('disabled')
             .css('cursor', 'wait');

        optional_data = $.extend({}, _this.data());
    }

    window.clearTimeout(formTimer);
    window.clearTimeout(pollingLoop);

    formTimer = window.setTimeout(function() {
        $.ajax({
            type: _this.is('form') ? 'POST' : 'GET',
            dataType: 'json',
            url: _this.is('form') ? _this.attr('action') : _this.data('href'),
            data: optional_data,
            error: function(obj, code, text) { json_error(obj, code, text) },
            success: function(obj) {
                json_results(obj);

                if (_this.is('form')) {
                    _this.css('opacity', 1)
                         .find('button[type=submit]')
                         .removeAttr('disabled')
                         .removeClass('disabled')
                         .css('cursor', 'pointer');
                } else if (_this.is('a')) {
                    _this.css('opacity', 1)
                         .removeClass('disabled')
                         .css('cursor', 'pointer');
                }

                if (obj.html) {
                    $.each(obj.html, function(key, val) {
                        if (val.type == 'dom')
                            $(val.target).html(val.text);
                        else if (val.type == 'append')
                            $(val.target).append(val.text);
                        else if (val.type == 'prepend')
                            $(val.target).prepend(val.text);
                        else if (val.type == 'before')
                            $(val.target).before(val.text);
                        else if (val.type == 'after')
                            $(val.target).after(val.text);
                    })
                }
                
                if (obj.dom) {
                    $.each(obj.dom, function(key, val) {
                        if (val.type == 'show')
                            $(val.target).show();
                        else if (val.type == 'hide')
                            $(val.target).hide();
                        else if (val.type == 'remove')
                            $(val.target).remove();
                        else if (val.type == 'reset')
                            $(val.target)[0].reset();
                        else if (val.type == 'appendTo')
                            $(val.element).appendTo(val.target);
                        else if (val.type == 'prependTo')
                            $(val.element).prependTo(val.target);
                    })
                }

                if (obj.classTarget) {
                    $.each(obj.classTarget, function(key, val) {
                        if (val.add)
                            $(val.target).addClass(val.add);
                        if (val.remove)
                            $(val.target).removeClass(val.remove);
                    })
                }

                if (obj.cssTarget) {
                    $.each(obj.cssTarget, function(key, val) {
                        $(val.target).css(val.css[0]);
                    })
                }

                if (obj.modal) {
                    window.clearTimeout(modalTimer);

                    modalTimer = window.setTimeout(function() {
                        modal(obj.modal.url);
                    }, obj.modal.delay)
                }

                if (obj.pollingLoop) {
                    window.clearTimeout(pollingLoop);

                    pollingLoop = window.setTimeout(function() {
                        json_ajax(_this);
                    }, obj.pollingLoop)
                }

                polling.removeClass('active');
            }
        })
    }, 400)
}

$(window).on('load', function (e) {
	preloading('hide')

    $('.load').each(function() {
        json_ajax($(this));
    })
}).on('scroll', function(e) {
	var st = $(this).scrollTop();

    if (st > 800)
    	$('.top').fadeIn(400);
    else
    	$('.top').fadeOut(400);
}).on('resize', function(e) {
	preloading('show')

	resizeTimer = window.setTimeout(function() {
		preloading('hide')
	}, 300)
});

function polling() {

}

function getFormData($form) {
    var unindexed_array = $form.serializeArray(),
        indexed_array = {};

    $.map(unindexed_array, function(n, i) {
        indexed_array[n['name']] = n['value'];
    })

    return indexed_array;
}

function modal(_url) {
	polling.addClass('active');

    window.clearTimeout(modalTimer);
    window.clearTimeout(modalCloseDelay);
    window.clearTimeout(goTimer);

    modalTimer = window.setTimeout(function() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: _url,
            error: function(obj, code, text) { json_error(obj, code, text) },
            success: function(obj) {
            	json_results(obj);

            	var modal = $('.modal');

                if (obj.header == false)
                	modal.children('.modal-header').hide();
                else {
                	modal.children('.modal-header').show();

                	if (obj.header.close == false)
                		modal.find('.modal-close').hide();
                	else
                		modal.find('.modal-close').show();
                }

                if (obj.size)
                    modal.addClass(obj.size);

                $('body').addClass('modal-active').removeClass('drawer-active');

                modal.find('.modal-title').html(obj.header.title);
                modal.find('.modal-content').html(obj.content);

                if (obj.closeDelay) {
                	window.clearTimeout(modalCloseDelay);

                	modalCloseDelay = window.setTimeout(function() {
                		$('body').removeClass('modal-active');
                	}, obj.closeDelay)
                }

                polling.removeClass('active');
            }
        })
    }, 400)
}

function preloading(status) {
	if (status == 'hide') {
					 window.clearTimeout(readyTimer);
		readyTimer = window.setTimeout(function() {
			$('body').addClass('ready');
		}, 100)
	} else {
		window.clearTimeout(resizeTimer);

		$('body').removeClass('ready');
	}
}

function c(t, type) {
	if (type == 'warn')
		console.warn(t);
	else if (type == 'alert')
		alert(t);
	else
		console.log(t);
}

function json_results(obj) {
	if (obj.go) {
		window.clearTimeout(goTimer);

		goTimer = window.setTimeout(function() {
			location.href = obj.go.url;
		}, obj.go.delay)

	}

	if (obj.toast)
		toast(obj.toast.text, obj.toast.timeOut)
}

function json_error(obj, code, text) {
	c(code + '(' + text + ')', 'warn')
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