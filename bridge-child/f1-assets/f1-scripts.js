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

	$(".package-container").on('click', function(){
			var info = $(this).find('.content-mobile').html();
			$("#mobile-content__info").show(function(){
				$(this).html(info)
			});
	});
});
