$(function(){
    $('textarea').bind('keydown keyup keypress change',function(){
        var pleng = $(this).val().length;
		var leng = 140-pleng;
		if(leng < 0){
			$('.count').css('color', 'Red');
   $(".btn").prop("disabled", true);
		}else{
			$('.count').css('color', 'Black');
    $(".btn").prop("disabled", false);
		}
        $('.count').html(leng);
    });
});