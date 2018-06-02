/* Jasper Hotel: HTML Template by Klaye Morrison (http://klayemorrison.com) */

$(document).ready(function () {
	
	'use strict';

	// Desktop Detection - Applies '.hover' class to document if non-touch browser
	
	if (!('ontouchstart' in document.documentElement)) { document.documentElement.className += ' hover'; }

	// Page Transitions
	
	if ($('body').hasClass('page-template-page-favourites')) {
		    var e=document.getElementById("refresh");
		    if(e.value=="no")e.value="yes";
		    else{e.value="no";location.reload();}
	}
	$('#body').animate({"opacity":"1"}, 600);

    // Drop Downs

    enquire.register("screen and (min-width: 1366px)", {
    	setup : function() {
        	$('nav li > ul').css({top:'75px'});
			$('nav li:not(.mega-menu)').hover(
				function () {
					$(this).find('ul:first').css('display','block').stop().animate({opacity:'1',top:'80'},300,'easeInOutQuart');
				}, 
				function () {
					$(this).find('ul:first').stop().animate({opacity:'0',top:'75'},300,'easeInOutQuart', function() {
						$(this).css({display:'none'});
					});
				}
			);
        },
        match : function() {
        	$('nav li > ul').css({top:'95px'});
			$('nav li:not(.mega-menu)').hover(
				function () {
					$(this).find('ul:first').css('display','block').stop().animate({opacity:'1',top:'100'},300,'easeInOutQuart');
				}, 
				function () {
					$(this).find('ul:first').stop().animate({opacity:'0',top:'95'},300,'easeInOutQuart', function() {
						$(this).css({display:'none'});
					});
				}
			);
        },
        unmatch : function() {
        	$('nav li > ul').css({top:'75px'});
			$('nav li:not(.mega-menu)').hover(
				function () {
					$(this).find('ul:first').css('display','block').stop().animate({opacity:'1',top:'80'},300,'easeInOutQuart');
				}, 
				function () {
					$(this).find('ul:first').stop().animate({opacity:'0',top:'75'},300,'easeInOutQuart', function() {
						$(this).css({display:'none'});
					});
				}
			);
        },
    });
	
	// Mega Menu

	enquire.register("screen and (min-width: 1150px)", {
        match : function() {
        	$('nav li.mega-menu > a').on('click', function() {
				if ($(this).parent().find('.drop').is(':visible')) {
					$(this).parent().find('.drop').fadeToggle(300).toggleClass('active');
					$(this).parent().toggleClass('current-drop');
					$('nav').toggleClass('drop-active');
					$('nav').removeClass('drop-fixed');
					$('.cover').stop().fadeToggle(300, 'easeInOutQuart');
				}
				else if ($('.drop').is(':visible')) {
					$('.drop:visible').fadeToggle(300, 'easeInQuart').toggleClass('active');
					$('.drop:visible').parent().toggleClass('current-drop');
					$(this).parent().find('.drop').fadeToggle(300, 'easeInOutQuart').toggleClass('active');
					$(this).parent().toggleClass('current-drop');
				}
				else {
					$(this).parent().find('.drop').fadeToggle(300, 'easeInOutQuart').toggleClass('active');
					$(this).parent().toggleClass('current-drop');
					$('nav').toggleClass('drop-active');
					$('nav').addClass('drop-fixed');
					$('.cover').stop().fadeToggle(300, 'easeInOutQuart');
				}
				if($(this).parent().hasClass('icon')) {
					$('.search-field').focus();
				}
				return false;
			});
			
			$('.drop-hit, .search-drop .drop-container').on('click', function(event) {
				event.stopPropagation();
			});

			$('body').on('click', function() {
				if ($('.drop').is(':visible')) {
					$('.drop:visible').fadeOut(300, 'easeInOutQuart').removeClass('active');
					$('nav').removeClass('drop-active');
					$('nav li.mega-menu').removeClass('current-drop');
					$('nav').removeClass('drop-fixed');
					$('.cover').fadeOut(300, 'easeInOutQuart');
				}
			});
        },
        unmatch : function() {
        	$('body').off();
        	$('nav li.mega-menu > a').off();
        	$('.cover').hide();
        	$('nav').removeClass('drop-active');
			$('nav').removeClass('drop-fixed');
			$('nav li.mega-menu > a').parent().find('.drop').show().removeClass('active');
			$('nav li.mega-menu > a').parent().removeClass('current-drop');
        }
    });

    // Mobile

    enquire.register("screen and (max-width: 1150px)", {
        setup : function() {
			$('.hamburger').on("click", function(e) {
				e.preventDefault();
				$(this).toggleClass('is-active');
				$('body').toggleClass('dropped');
				$('nav').delay(300).animate({scrollTop: '0'}, 0);
				$('.cover, .nav-cover').stop().fadeToggle(300, 'easeInOutQuart');
				$('.drop').show();
			});
        },
        match : function() {
			$('footer ul').children().clone(true,true).insertBefore('li.icon.mega-menu');
			$('nav, .book-nav').delay(300).queue(function (next) { $(this).css('transition', '.3s'); next(); });
        },
        unmatch : function() {
			$('.hamburger').removeClass('is-active');
			$('body').removeClass('dropped');
			$('.cover, .nav-cover').hide();
			$('.drop').hide();
			$('nav .footer-link').remove();
			$('nav, .book-nav').css('transition', 'none');
        }
    });

    // Current Navigation
	
    $('nav li:not(.mega-menu) a').each(function () {
        if (this.href == window.location.href.split('#')[0]) {
            $(this).parent().addClass('current-menu-item');
			$(this).parent().parent().parent().addClass('current-menu-item');
			$(this).parent().parent().parent().parent().parent().addClass('current-menu-item');
        }
	});

	// Language

	enquire.register("screen and (max-width: 1150px)", {
        match : function() {
			$('#language li:first-child').on('click', function(e) {
				e.preventDefault();
				$('#language').toggleClass('langdrop');
			});
        }
    });

	// Lightbox

	function featherOpen() { $('.featherlight-content').addClass('lightbox-pop'); }
	function featherClose() { $('.featherlight-content').removeClass('lightbox-pop'); }
	
	$('.lightbox, .gallery figure a').featherlightGallery({
		openSpeed: 300,
		closeSpeed: 300,
		galleryFadeIn: 0,
		galleryFadeOut: 0,
		afterOpen: featherOpen,
		beforeClose: featherClose
	});

	// Instagram

	$.ajax({
	    type: 'GET',
	    dataType: 'jsonp',
	    cache: false,
	    url: 'https://api.instagram.com/v1/users/437900816/media/recent/?access_token=437900816.1677ed0.8edaba7af40346c4a4634ce657cb4e55',
	    success: function(data) {
	        for (var i = 0; i < 5; i++) {
	            $('.instagram .images').append("<a href='" + data.data[i].link + "' target='_blank'><img src='" + data.data[i].images.thumbnail.url +"'></a>");
	        }
	    }
	});

	// Sidebar

	enquire.register("screen and (min-width: 1367px)", {
		match : function() {
			$('#sidebar').trigger('sticky_kit:detach');
			$('#sidebar').stick_in_parent({
				offset_top : 170
			});
		}
	});
	enquire.register("screen and (max-width: 1367px) and (min-width: 1150px)", {
		match : function() {
			$('#sidebar').trigger('sticky_kit:detach');
			$('#sidebar').stick_in_parent({
				offset_top : 150
			});
		}
	});

	// Forms

	enquire.register("screen and (max-width: 1150px)", {
		match : function() {
			$('.extras').on('click','.col.name',function() {
				$(this).parent().find('.details').toggleClass('active');
			});
		},
		unmatch : function() {
			$('.extras').off();
		}
	});

	/********** Sections **********/

	$('.section-full').each(function() {
		var nextdiv = $(this).next();
		if(nextdiv.hasClass('section-full')){
			$(this).css({'margin-bottom':'0'});
		}
	});

	$('.back, .thumb, .header, .navgrid a, .hero-back').each(function() {
        var attr = $(this).attr('data-background');
            if (typeof attr !== typeof undefined && attr !== false) {
            $(this).css('background-image', 'url('+attr+')');
        }
    });
	
	// Hero
	
	if ($('.hero .slider').length) {
		$('.hero .slider').carouFredSel({
			width: '100%',
			height: '100%',
			swipe: true,
			responsive: true,
			scroll: {
				duration: 600,
				easing: 'easeInOutQuart',
				pauseOnHover: true,
				fx: 'crossfade',
				onBefore: function(data) {
					data.items.visible.find('.title, .sub-title, .button-container').animate({opacity: 0}, 0);
					data.items.visible.each(function() {
						$(this).find('.content-container.layout-1').find('.title').delay(300).animate({opacity: 1}, 1000);
						$(this).find('.content-container.layout-1').find('.sub-title').delay(450).animate({opacity: 1}, 1000);
						$(this).find('.content-container.layout-1').find('.button-container').delay(650).animate({opacity: 1}, 1000);
						$(this).find('.content-container.layout-2').find('.button-container').delay(300).animate({opacity: 1}, 1000);
					});
				}
			},
			auto: { timeoutDuration: 4000 },
			pagination: {container: function() { return $(this).parent().siblings('.pagination'); }},
			prev: {
			button: function() {
				return $(this).parent().siblings(".prev");
				}
			},
			next: {
			button: function() {
				return $(this).parent().siblings(".next");
				}
			}
		});
		
		$('.hover .hero .item .button').hover(
			function () {
				$(this).parent().parent().parent().addClass('over');
				if ($('html').hasClass('hover')) { $(this).parent().parent().parent().find('.content-container.layout-2 .title').stop().animate({opacity: .4}, 600); }
			}, 
			function () {
				$(this).parent().parent().parent().removeClass('over');
				if ($('html').hasClass('hover')) { $(this).parent().parent().parent().find('.content-container.layout-2 .title').stop().animate({opacity: .25}, 600); }
			}
		);
		
		$('.hero').find('.content-container.layout-1').find('.title').delay(300).animate({opacity: 1}, 1000);
		$('.hero').find('.content-container.layout-1').find('.sub-title').delay(450).animate({opacity: 1}, 1000);
		$('.hero').find('.content-container.layout-1').find('.button-container').delay(650).animate({opacity: 1}, 1000);
		$('.hero').find('.content-container.layout-2').find('.title').delay(300).animate({opacity: .25}, 1000);
		$('.hero').find('.content-container.layout-2').find('.button-container').delay(500).animate({opacity: 1}, 1000);
	}

	// Hero Panels

	enquire.register("screen and (max-width: 1150px)", {
		setup : function() {
			$('.hero-panels').addClass('ready');

			$('.hover .hero .item .button').hover(
				function () {
					$(this).parent().parent().addClass('over');
				}, 
				function () {
					$(this).parent().parent().removeClass('over');
				}
			);
		},
		match : function() {
			if ($('.hero-panels-container').length) {
				$('.hero-panels-container').carouFredSel({
					swipe: true,
					responsive: true,
					scroll: {
						duration: 600,
						easing: 'easeInOutQuart',
						pauseOnHover: true,
						fx: 'crossfade'
					},
					items: {
						visible: 1,
						height: 'variable'
					},
					auto: { timeoutDuration: 4000 },
					pagination: {container: function() { return $(this).parent().siblings('.pagination'); }},
					prev: {
					button: function() {
						return $(this).parent().siblings(".prev");
						}
					},
					next: {
					button: function() {
						return $(this).parent().siblings(".next");
						}
					}
				});
			}
		},
		unmatch : function() {
			$('.hero-panels-container').trigger('destroy');
		}
	});

	// Slideshow

	var slideshow_mobile = function() {
		if ($('.slideshow .slider').length) {
			$('.slideshow .slider').carouFredSel({
				swipe: true,
				responsive: true,
				scroll: {
					duration: 400,
					easing: 'easeInOutQuart',
					pauseOnHover: true
				},
				items: {
					visible: 1,
					height: 'variable'
				},
				auto: { timeoutDuration: 4000 },
				pagination: {container: function() { return $(this).parent().siblings('.pagination'); }}
			});
		}
	}

	var slideshow_desktop = function() {
		if ($('.slideshow .slider').length) {
			$('.slideshow .slider').carouFredSel({
				swipe: true,
				responsive: true,
				scroll: {
					duration: 600,
					easing: 'easeInOutQuart',
					pauseOnHover: true,
					fx: 'crossfade'
				},
				items: {
					visible: 1,
					height: 'variable'
				},
				auto: { timeoutDuration: 4000 },
				pagination: {container: function() { return $(this).parent().parent().siblings('.navgrid'); }, anchorBuilder: false},
				prev: {
				button: function() {
					return $(this).parent().siblings(".prev");
					}
				},
				next: {
				button: function() {
					return $(this).parent().siblings(".next");
					}
				}
			});
		}
	}

	enquire.register("screen and (min-width: 768px)", {
		setup : function() {
			$(slideshow_mobile);
		},
		match : function() {
			$(slideshow_desktop);
		},
		unmatch : function() {
			$(slideshow_mobile);
		}
	});

	enquire.register("screen and (min-width: 480px) and (max-width: 1150px)", {
		match : function() {
			$('.slideshow').each(function() {
				var prevdiv = $(this).prev();
				if(prevdiv.hasClass('section-full')){
					$(this).css({'margin-top':'-70px'});
				}
			});
		}
	});

	enquire.register("screen and (max-width: 480px)", {
		match : function() {
			$('.slideshow').each(function() {
				var prevdiv = $(this).prev();
				if(prevdiv.hasClass('section-full')){
					$(this).css({'margin-top':'-50px'});
				}
			});
		}
	});

	// Slideshow Nav

	enquire.register("screen and (max-width: 1150px)", {
        match : function() {
        	if ($('.slideshow-nav .slider').length) {
	        	$('.slideshow-nav .slider').carouFredSel({
					width: '100%',
					height: '100%',
					swipe: true,
					responsive: true,
					scroll: {
						duration: 400,
						easing: 'easeInOutQuart'
					},
					auto: false,
					pagination: {container: function() { return $(this).parent().parent().find('.pagination'); }}
				});
			}
        }
    });

    enquire.register("screen and (min-width: 1150px)", {
        match : function() {
        	$('.slideshow-nav .slider').trigger('destroy');
        	$('.slideshow-nav').each(function() {
	        	$(this).find('.tabs li a').on('mouseover', function () {
					if (!$(this).parent().hasClass('selected')) {

						var current = $(this).parent().parent().parent().parent();
						var selected = $(this).parent().prop('className');
						$(this).parent().parent().parent().parent().find('.item.' + selected).addClass('over');
						
						setTimeout(function(){
							if ($(current).find('.item.' + selected).hasClass('over')) {
								$(current).find('.item').removeClass('selected');
								$(current).find('.item.' + selected).addClass('selected');
								$(current).find('.tabs li').removeClass('selected');
								$(current).find('.tabs li.' + selected).addClass('selected');
							}
						}, 200);
					}
				});

				$(this).find('.tabs li a').on('mouseout', function () {
					$('.slideshow-nav .item').removeClass('over');
				});

				$(this).find('.item:first-child, .tabs li:first-child').addClass('selected');
			});
        }
    });

    // Carousel

    var carousel_mobile = function() {
    	$('.carousel').addClass('slideshow');
    	$('.carousel .button').each(function() {
    		$(this).addClass('small');
    	});

		$('.carousel .slider').carouFredSel({
			swipe: true,
			responsive: true,
			scroll: {
				duration: 400,
				easing: 'easeInOutQuart',
				pauseOnHover: true
			},
			items: {
				visible: 1,
				height: 'variable'
			},
			auto: { timeoutDuration: 4000 },
			pagination: {container: function() { return $(this).parent().siblings('.pagination'); }},
			prev: {
			button: function() {
				return $(this).parent().siblings(".prev");
				}
			},
			next: {
			button: function() {
				return $(this).parent().siblings(".next");
				}
			}
		});
	}

    var carousel_desktop = function() {
    	$('.carousel').removeClass('slideshow');
    	$('.carousel .button').each(function() {
    		$(this).removeClass('small');
    	});

		function highlight(items) {
			items.filter(':eq(1)').addClass('active');
		}
		function unhighlight(items) {
			items.removeClass('active');
		}
		
		$('.carousel .slider').carouFredSel({
			width: '100%',
			swipe: true,
			items: { visible: 3, start: -1 },
			scroll: {
				items: 1,
				duration: 600,
				easing: 'easeInOutQuart',
				timeoutDuration: 3000,
				pauseOnHover: true,
				onBefore: function(data) {
				  unhighlight(data.items.old);
				  highlight(data.items.visible);
				}
			},
			prev: {
			button: function() {
				return $(this).parent().siblings('.prev');
				}
			},
			next: {
			button: function() {
				return $(this).parent().siblings('.next');
				}
			}
		});

		$('.carousel .slider .item:nth-child(2)').addClass('active');
	}

	enquire.register("screen and (min-width: 1150px)", {
		setup : function() {
			$(carousel_mobile);
		},
		match : function() {
			$(carousel_desktop);
		},
		unmatch : function() {
			$(carousel_mobile);
		}
	});
	
	// Panel
	
	$('.panel .right .slider').carouFredSel({
		width: '100%',
		height: '100%',
		swipe: true,
		responsive: true,
		scroll: {
			duration: 600,
			easing: 'easeInOutQuart',
			onBefore: function(data) {
				data.items.visible.addClass('current');
				data.items.old.removeClass('current');
			}
		},
		auto: false,
		synchronise: ['.panel .left .slider', false],
		pagination: { container: '.panel .pagination' }
	});
	
	$('.panel .left .slider').carouFredSel({
		width: '100%',
		height: '100%',
		swipe: true,
		responsive: true,
		scroll: {
			duration: 600,
			easing: 'easeInOutQuart',
			fx: 'crossfade',
			onBefore: function(data) {
				data.items.visible.addClass('current');
				data.items.old.removeClass('current');
			}
		},
		auto: false,
		synchronise: ['.panel .right .slider', false]
	});
	
	$('.panel .nav.prev').click(function() { $('.panel .slider').trigger('prev'); });
	$('.panel .nav.next').click(function() { $('.panel .slider').trigger('next'); });

	$('.hover .panel-list .panel .button, .hover .panel.section-full.panel-hero .button').hover(
		function () {
			$(this).parent().parent().parent().find('.left').addClass('over');
		}, 
		function () {
			$(this).parent().parent().parent().find('.left').removeClass('over');
		}
	);

	$('.hover .panel.section-full:not(.panel-hero) .button').hover(
		function () {
			$(this).parent().parent().parent().parent().parent().parent().find('.left').addClass('over');
		}, 
		function () {
			$(this).parent().parent().parent().parent().parent().parent().find('.left').removeClass('over');
		}
	);

	// Gallery
	
	var $container = $('.gallery'),
	colWidth = function () {
		var w = $container.width(),
		columnNum = 4,
		columnWidth = 0,
		sizeVar = 0;
		if (w > 1100) { columnNum  = 4; }
		else { columnNum  = 2; }
		columnWidth = Math.floor(w/columnNum);
		function columnSize() {
			if (w < 360) { sizeVar = 35; }
			else if (w < 480) { sizeVar = 60; }
			else if (w < 640) { sizeVar = 70; }
			else if (w < 768) { sizeVar = 80; }
			else if (w < 1100) { sizeVar = 120; }
			else if (w < 1366) { sizeVar = 75; }
			else if (w < 1680) { sizeVar = 90; }
			else if (w < 2000) { sizeVar = 100; }
			else { sizeVar = 150; }
			$container.find('figure').each(function() {
				var $item = $(this),
				multiplier_w = $item.attr('class').match(/item-w(\d)/),
				multiplier_h = $item.attr('class').match(/item-h(\d)/),
				width = multiplier_w ? columnWidth*multiplier_w[1] : columnWidth,
				height = multiplier_h ? columnWidth*multiplier_h[1]*0.72-sizeVar : columnWidth*0.72-(sizeVar/2);
				$item.css({
					width: width,
					height: height
				});
			});
		}
		columnSize();
		return columnWidth;
	};

	function runisotope() {
		$container.isotope({
			layoutMode: 'packery',
			itemSelector: 'figure',
			transitionDuration: '0',
			resizable: false,
			masonry: {
				columnWidth: colWidth()
			}
		});
	}

	runisotope();
	
	$(window).resize(function() {
		runisotope();
    });

    $('.gallery figure img').lazyload({
		effect: 'fadeIn',
		failure_limit: 10,
		effectspeed: 300
	});

	// Testimonials
	
	var $testimonials = $('.testimonials .center').isotope({
		layoutMode: 'packery',
		itemSelector: '.item',
		transitionDuration: '0',
		resize: false
	});

	// Services
	
	$('.services .item').hover(
		function () {
			$(this).parent().addClass('over');
		}, 
		function () {
			$(this).parent().removeClass('over');
		}
	);

	// Accordion
	
    $('.accordion .question').click(function () {
		$(this).parent().stop().toggleClass('reveal');
        $(this).parent().find('.answer').stop().toggle(300, 'easeInOutQuart');
    });

    // Boxes

    if($('.boxes .item').length > 15){
    	$('.boxes .item:gt(14)').hide();
		$('#button-load').css({'display':'table'});

		$('#button-load').click(function() {
			$('.boxes .item').fadeIn(400);
			$(this).hide();
		})
	}

	// Features
	
	$('.features .item .button').hover(
		function () {
			$(this).parent().parent().parent().addClass('over');
		}, 
		function () {
			$(this).parent().parent().parent().removeClass('over');
		}
	);
	
	/********** Select Boxes **********/

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$('.bar .field .value').css('display','block');
	}
	else {
		$('.bar select').selectBoxIt({
			showEffect: 'fadeIn',
			showEffectSpeed: 200,
			hideEffect: 'fadeOut',
			hideEffectSpeed: 200
		});
	}

	if ($('.bar').length){
		$('.bar .field:not(:first-child):not(.guest-display) .value').each(function() {
			$(this).text($(this).parent().find('select option:selected').text());
		});
	    $('.bar select').on('change', function() {
			$(this).parent().find('.value').text($(this).parent().find('option:selected').text());
		});
	}
		
	/********** Date Picker **********/

	// To display the calendar in a different language, go to https://github.com/jquery/jquery-ui/tree/master/ui/i18n, copy the JS from the relevant language file and paste here.

	var datecookie = Cookies.get('check-in');
	if (document.cookie.indexOf(datecookie) > -1 ) {
		var date1 = datecookie.substr(0,datecookie.indexOf('+'));
		var date2 = datecookie.substr(datecookie.indexOf('+')+1);
		date1 = parseInt(date1) + 1;
		date2 = date2.replace(/\+/g, ' ');
		var mindate = date1 + ' ' + date2;
	}
	else {
		var mindate = '0M';
	}

	// Booking Bar

	if ($('.bar').length){
		
		$(this).find('.arrival-date').datepicker({
			minDate: '0M',
			numberOfMonths: 1,
			dateFormat: 'd M yy',
			beforeShow: function() {
		        setTimeout(function() {
		            $('<div class="close"></div>').appendTo('#ui-datepicker-div');
		        }, 1 );
		    },
			onSelect: function() {
				$(this).parent().parent().find('.field.arrival .value').html($(this).parent().parent().find('.arrival-date').val().split(' ')[0]);
				$(this).parent().parent().find('.field.arrival label').html($(this).parent().parent().find('.arrival-date').val().split(' ')[1]);
				$(this).parent().parent().find('.field.arrival').addClass('active');
				var date = $(this).datepicker('getDate');
				date.setDate(date.getDate() + 1);
				$(this).parent().parent().find('.departure-date').datepicker('option', 'minDate', date);
				$(this).parent().parent().find('.field.departure .value').html($(this).parent().parent().find('.departure-date').val().split(' ')[0]);
				$(this).parent().parent().find('.field.departure label').html($(this).parent().parent().find('.departure-date').val().split(' ')[1]);
				$(this).change();
			}
		});
		
		$(this).find('.field.arrival').click(function() { $(this).find('.arrival-date').datepicker('show'); });

		$(this).find('.departure-date').datepicker({
			minDate: mindate,
			numberOfMonths: 1,
			dateFormat: 'd M yy',
			beforeShow: function() {
		        setTimeout(function() {
		            $('<div class="close"></div>').appendTo('#ui-datepicker-div');
		        }, 1 );
		    },
			onSelect: function() {
				$(this).parent().parent().find('.field.departure .value').html($(this).parent().parent().find('.departure-date').val().split(' ')[0]);
				$(this).parent().parent().find('.field.departure label').html($(this).parent().parent().find('.departure-date').val().split(' ')[1]);
				var date = $(this).datepicker('getDate');
				date.setDate(date.getDate() + 1);
				$(this).parent().parent().find('.field.departure').addClass('active');
				$(this).change();
			}
		});
		
		$(this).find('.field.departure').click(function() { $(this).find('.departure-date').datepicker('show'); });
	}

	// Booking Form

	$('.contact-arrival').datepicker({
		minDate: '0M',
		numberOfMonths: 1,
		dateFormat: 'd M yy',
		beforeShow: function() {
	        setTimeout(function() {
	            $('<div class="close"></div>').appendTo('#ui-datepicker-div');
	        }, 1 );
	    },
		onSelect: function() {
			var date = $(this).datepicker('getDate');
			date.setDate(date.getDate() + 1);
			$('.contact-departure').datepicker('option', 'minDate', date);
		}
	});

	$('.contact-departure').datepicker({
		minDate: '0M',
		numberOfMonths: 1,
		dateFormat: 'd M yy',
		beforeShow: function() {
	        setTimeout(function() {
	            $('<div class="close"></div>').appendTo('#ui-datepicker-div');
	        }, 1 );
	    }
	});

	$('#ui-datepicker-div').on('click','.close',function() {
		$('.arrival-date, .departure-date, .contact-arrival, .contact-departure').datepicker('hide');
	});

    /********** Popup / Share **********/

    // Uncomment the below to make the popup appear when a user visits the website. Once closed, it won't appear again for 30 days

	/*var popitcookie = Cookies.get('cookiepop');
    if (document.cookie.indexOf(popitcookie) > -1 ) { }
    else {
	    var popit = function() {
			$('#pop').fadeIn(300).addClass('popped');
			Cookies.set('cookiepop', 'true', { expires: 30 });
		}
		setTimeout(function(){
			$(popit);
		}, 2000);
	}*/

	$('.popit').click(function() {
		$('#pop').fadeIn(300).addClass('popped');
	});

    $('#pop .close').click(function() {
    	$('#pop').fadeOut(300).removeClass('popped');
    });

    $('#share-pop').click(function() {
    	$('#share').fadeIn(300).addClass('popped');
    	$('#share .close').click(function() {
	    	$('#share').fadeOut(300).removeClass('popped');
	    })
    });

    // Copy Source

    setTimeout(function(){

	    function feathercodeOpen() { $('.featherlight-content').addClass('lightbox-code'); }
		function feathercodeClose() { $('.featherlight-content').removeClass('lightbox-code'); }
		
		$('.view-source-button').featherlight({
			openSpeed: 300,
			closeSpeed: 300,
			beforeOpen: feathercodeOpen,
			afterClose: feathercodeClose
		});

	    var pre = document.getElementsByTagName('pre');

	    for (var i = 0; i < pre.length; i++) {
		    var button = document.createElement('button');
	        button.className = 'button button-copy small';
	        button.innerHTML = 'Copy <i class="icon ion-ios-copy"></i>';
	        pre[i].appendChild(button);
		}

		var copyCode = new Clipboard('.button-copy', {
		    target: function(trigger) {
		        return trigger.previousElementSibling;
		    }
		});

		copyCode.on('success', function(event) {
		    event.clearSelection();
		    event.trigger.className = 'button button-copy small active';
		    window.setTimeout(function() {
		        event.trigger.className = 'button button-copy small';
		    }, 1000);
		    setTimeout(function(){
			    var copyCode = new Clipboard('.button-copy', {
				    target: function(trigger) {
				        return trigger.previousElementSibling;
				    }
				});
			}, 500);
		});

	}, 500);

});

$(window).on('load', function() {
	
	'use strict';

	$(window).trigger('resize');

	// Search
	
	enquire.register("screen and (min-width: 1150px)", {
		match : function() {
			$('.search-field').autoGrowInput();
		}
	});

	// Instagram

	setTimeout(function(){
		$('.instagram img').each(function(){
	        var src = $(this).attr('src');
	        $(this).attr('src',src.replace(/vp.*\/.{32}\/.{8}\//, '').replace('150x150', '320x320'));
	    });
	}, 1000);

});