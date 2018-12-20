jQuery( document ).ready(function( $ ) {
  $('.feature-slider .g-col-6 > div').on('click', function() {
    var id =  $(this).attr('id');

    // Image switching
    $(this).parents('.g-col-6').siblings('.g-col-5').children('img').removeClass('active');
    $(this).parents('.g-col-6').siblings('.g-col-5').children('img#' + id).addClass('active');

    // Tile "active" switching
    $(this).parents('.g-col-6').children('div').removeClass('active');
    $(this).addClass('active');
  });

  //Mobile Content
  function mobile_content_load() {
    if ($(window).width() <= 767) {

    var content = $('.package-container:first-of-type .content-mobile').html();
     $('.mobile-content__info').html(content);
    }
  }

  mobile_content_load();
    $(window).resize(function() {
      mobile_content_load();
  });

	$(".package-container").on('click', function(){
			var info = $(this).find('.content-mobile').html();
			$(".mobile-content__info").show(function(){
				$(this).html(info)
			});
	});
});
