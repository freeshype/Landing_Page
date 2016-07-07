jQuery(function($){

	$(document).ready(function() {

		var body = $('section'),
				header = $('header');

		body.not('#pre-loader').imagesLoaded(function() {

			$('#pre-loader').fadeOut(500);

			header.add(body).fadeIn(1000);

			// Fitvids

			$('section').fitVids();


			// Nicescroll

			$('header').niceScroll({
				cursorborder: 'none',
				horizrailenabled: false
			});


			// Sidebar

			var sbToggle = $('.sidebar-toggle'),
					sb 			 = $('aside.side-bar');

			sb.niceScroll({
				cursorborder: 'none',
				horizrailenabled: false
			});

			sbToggle.hover(function() {
				$('span.sidebar-popup').stop().fadeIn(200);
			}, function() {
				$('span.sidebar-popup').stop().fadeOut(200);
			});

			sbToggle.toggle(function() {
				sb.animate({
					right: '0'
				});
			}, function() {
				sb.animate({
					right: '-100%'
				});
			});


			// Flexslider

			$('.flexslider').flexslider();


			// Portfolio

			var itemInfo = $('.portfolio .item-info');

			var infoRaise = itemInfo.outerHeight() / 2;

			itemInfo.css('margin-top', -infoRaise);

			var filterLinks = $('.filter li');

		  filterLinks.click(function(e) {

		  	e.preventDefault();

		  	var filter = $(this).attr('data-filter'),
		  			portItem = $('.item');

		  	portItem.each(function() {
		  		if ($(this).hasClass(filter) || filter == '*') {
		  			$(this).animate({
		  				opacity: 1
		  			});

		  		} else if (!$(this).hasClass(filter)) {
		  			$(this).animate({
		  				opacity: .1
		  			});
		  		};
		  	})

				if (!$(this).hasClass('current')) {
					filterLinks.removeClass('current');
					$(this).addClass('current');
				}
			});

			// WP

			if ($('#wpadminbar').length) {
				$('#site-header').add('aside.side-bar').addClass('adminbarexists');
			}

		});

	});

});
