// slide-to-side

function slide() {
		var $last = $(".slide img").last().index();
		var $ff = $(".slide img").first().index();
		
		if( $(".slide img.selected").index() == $ff){
			$(".slide img.selected").removeClass('selected').next().addClass('selected');
			}
		
		else if( $(".slide img.selected").index() == $last){
			$(".slide img.selected").removeClass('selected');
			$(".slide img").eq($ff).addClass('selected');
			}
		else{
			$(".slide img.selected").removeClass('selected').next().addClass('selected');
		}
};


$(document).ready(function() {
	var timer;
    timer = setInterval("slide()", 4000);
});