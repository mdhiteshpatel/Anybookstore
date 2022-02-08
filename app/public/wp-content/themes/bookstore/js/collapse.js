(function ($) {
    'use strict';
    $( document ).ready(function() {
        // Filter Collapse
        $(".title-label").click(function() {
            $(this).toggleClass("active").next().slideToggle();
        })
    });

	// Featured book section slider

	$(document).ready(function(){
		var windowWidth = $(window).width();
			var numberOfVisibleSlides;
			if (windowWidth <= 480) {
				numberOfVisibleSlides = 1;
			} else if (windowWidth <= 1279) {
				numberOfVisibleSlides = 1;
			} else {
				numberOfVisibleSlides = 2;
			}

		  	$('.featured-book-list').bxSlider({
			auto      : false,
			minSlides : numberOfVisibleSlides,
			maxSlides : numberOfVisibleSlides,
			moveSlides: 1,
			slideWidth: 2400,
			slideMargin: 20,
			touchEnabled:false,
		});
	});
	
	// Top rated book section slider

	$(document).ready(function(){
		var windowWidth = $(window).width();
			var numberOfVisibleSlides, numberslideMargin;
			if (windowWidth <= 480) {
				numberOfVisibleSlides = 1;
				numberslideMargin = 20;
			} else if (windowWidth <= 991) {
				numberOfVisibleSlides = 3;
				numberslideMargin = 30;
			} else if (windowWidth <= 1279) {
				numberOfVisibleSlides = 4;
				numberslideMargin = 40;
			} else if (windowWidth <= 1450) {
				numberOfVisibleSlides = 5;
				numberslideMargin = 50;
			} else {
				numberOfVisibleSlides = 6;
				numberslideMargin = 100;
			}
		  	$('.top-book-list').bxSlider({
				auto      : false,
				minSlides : numberOfVisibleSlides,
			  	maxSlides : numberOfVisibleSlides,
			  	moveSlides: 1,
			  	slideWidth: 2400,
			  	slideMargin: numberslideMargin,
			  	touchEnabled:false,
		  	});
	});

	$( document ).ready(function() {
		$(".title-lable").click(function() {
			$(this).toggleClass("active").next().slideToggle();
		});
	
		// Grid View and List View
		$('.grid-btn').click(function(){
			$('.switch-view').addClass("grid-view");
			$('.grid-btn').addClass("active");
			$('.list-btn').removeClass("active");
			$('.switch-view').removeClass("list-view");
		});
		$('.list-btn').click(function(){
			$('.switch-view').addClass("list-view");
			$('.list-btn').addClass("active");
			$('.grid-btn').removeClass("active");
			$('.switch-view').removeClass("grid-view");
		});
	});


    $(document).ready(function () {
		$(document).on('click', '#book-filter-form .filter-serch-btn', function (e) {
			e.preventDefault();
			var checkCategories = {};
			var checkPublisher = {};
			var checkAuthor = {};
			
			$('.check-categories:checked').each(function(i){
				if (! checkCategories.hasOwnProperty(this.name))
					{checkCategories[this.name] = [this.value];}
				else
					{checkCategories[this.name].push(this.value);}
	        });

	        $('.check-publisher:checked').each(function(i){
				if (! checkPublisher.hasOwnProperty(this.name))
					{checkPublisher[this.name] = [this.value];}
				else
					{checkPublisher[this.name].push(this.value);}
	        });

	        $('.check-author:checked').each(function(i){
				if (! checkAuthor.hasOwnProperty(this.name))
					{checkAuthor[this.name] = [this.value];}
				else
					{checkAuthor[this.name].push(this.value);}
	        });

            var filldata = {
	            'action': 'book_filter_item',
	            'check-categories': checkCategories,
	            'check-publisher': checkPublisher,
				'check-author': checkAuthor,
	        };
		
		})
		// jQuery.ajax({
		// 	type: "POST",
		// 	url : "/wp-admin/admin-ajax.php",
		// 	data: filldata,
		// 	success: function(response){
		// 		// alert('yes');
		// 		$('.switch-view').html(response);
		// 	}
		// });
	

		$("#categories-all, #publisher-all, #author-all").click(function () {
		    $(this).parents('.checkbox').nextAll().find('.check-categories, .check-publisher, .check-author').prop('checked', this.checked);
		})
	});
})(jQuery);