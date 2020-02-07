;(function($) {

    'use strict'

	var rollAnimation = function() {
		$('.orches-animation').each( function() {
		var orElement = $(this),
			orAnimationClass = orElement.data('animation'),
			orAnimationDelay = orElement.data('animation-delay'),
			orAnimationOffset = orElement.data('animation-offset');

			orElement.css({
				'-webkit-animation-delay':  orAnimationDelay,
				'-moz-animation-delay':     orAnimationDelay,
				'animation-delay':          orAnimationDelay
			});

			orElement.waypoint(function() {
				orElement.addClass('animated').addClass(orAnimationClass);
			},{ triggerOnce: true, offset: orAnimationOffset });
		});
	};

	var detectViewport = function() {
		$('[data-waypoint-active="yes"]').waypoint(function() {
			$(this).trigger('on-appear');
		}, { offset: '90%', triggerOnce: true });

		$(window).on('load', function() {
			setTimeout(function() {
				$.waypoints('refresh');
			}, 100);
		});
    };
    
	var projectEffect = function() {
		var effect = $('.project-wrap').data('portfolio-effect');

		$('.project-item').children('.item-wrap').addClass('orches-animation');

		$('.project-wrap').waypoint(function(direction) {
			$('.project-item').children('.item-wrap').each(function(idx, ele) {
				setTimeout(function() {
					$(ele).addClass('animated ' + effect);
				}, idx * 150);
			});
		}, { offset: '75%' });
    };
    
	var counter = function() {
		$('.roll-counter').on('on-appear', function() {
			$(this).find('.numb-count').each(function() {
				var to = parseInt($(this).attr('data-to'));
				$(this).countTo({
					to: to,
				});
			});
		}); //counter
    };   
    
	var progressBar = function() {
		$('.progress-bar').on('on-appear', function() {
			$(this).each(function() {
				var percent = $(this).data('percent');

				$(this).find('.progress-animate').animate({
					"width": percent + '%'
				},3000);

				$(this).parent('.roll-progress').find('.perc').addClass('show').animate({
					"width": percent + '%'
				},3000);
			});
		});
    };    
    
	var panelsStyling = function() {
		$(".panel-row-style").each( function() {
			if ($(this).data('hascolor')) {
				$(this).find('h1,h2,h3,h4,h5,h6,a,.fa, div, span').css('color','inherit');
			}
			if ($(this).data('hasbg') && $(this).data('overlay') ) {
				$(this).append( '<div class="overlay"></div>' );
				var overlayColor = $(this).data('overlay-color');
				$(this).find('.overlay').css('background-color', overlayColor );				
			}
		});
		$('.panel-grid .panel-widget-style').each( function() {
			var titleColor = $(this).data('title-color');
			var headingsColor = $(this).data('headings-color');
			if ( titleColor ) {
				$(this).find('.widget-title').css('color', titleColor );
			}
			if ( headingsColor ) {
				$(this).find('h1,h2,h3:not(.widget-title),h4,h5,h6,h3 a').css('color', headingsColor );
			}			
		});	
	};    

	// Dom Ready
	$(function() {       
		counter();
		progressBar();
		detectViewport();
        rollAnimation();
		panelsStyling();
        projectEffect();
   	});
})(jQuery); 