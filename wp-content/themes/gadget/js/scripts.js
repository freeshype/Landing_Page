jQuery(function($){

	$(document).ready(function() {

		var body = $('body');

		$(body).imagesLoaded(function() {

			body.fitVids();

			// Side Menu

			var menuToggle = $('#nav-toggle'),
				menuCover = $('.menu-cover'),
				menuClose = $('.menu-close');

			menuToggle.toggle(function() {
				$(this).addClass('open');
				$('#header-side').add('#page').addClass('menu-open');
			}, function() {
				$('#header-side').add('#page').removeClass('menu-open');
				$(this).removeClass('open');
			});

			// Gallery

			$('.gallery').masonry({
			  itemSelector: '.gallery-item'
			});

			// Search Window

			var searchWindow = $('#search-window');

			$('.search-toggle').click(function() {
				searchWindow.fadeIn();
				searchWindow.find('input').focus();
			});

			$('.close-search').click(function() {
				searchWindow.fadeOut();
			});

		});

	});

});
