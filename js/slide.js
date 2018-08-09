// slide //

function slide() {
		var $last = $(".slide img").last().index();
		var $ff = $(".slide img").first().index();
		
		if( $(".slide img.selected").index() == $ff){
			$(".slide img.selected").removeClass('selected').next().addClass('selected');
			$(".slide-content").css("transform","translateX("+$(".slide img.selected").index() * -600+"px)");
			}
		
		else if( $(".slide img.selected").index() == $last){
			$(".slide img.selected").removeClass('selected');
			$(".slide img").eq($ff).addClass('selected');
			$(".slide-content").css("transform","translateX("+$(".slide img.selected").index() * -600+"px)");
			}
		else{
			$(".slide img.selected").removeClass('selected').next().addClass('selected');
			$(".slide-content").css("transform","translateX("+$(".slide img.selected").index() * -600+"px)");
		}
};


$(document).ready(function() {
	var timer;
    timer = setInterval("slide()", 4000);
});