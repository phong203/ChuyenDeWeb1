$(document).ready(function(){
	
	$('ul>li').css('list-style-type','none');
	
	$('a').click(function(){
		$('#formRename').css('display','inline-block');
		var a = $(this).html();
		$('#oldName').attr('value',a);


	});
});