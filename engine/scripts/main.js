
$(document).ready(function(){

	$('.give_text').keyup(function(){
		input = $(this).val();
		console.log(input);
		$(this).attr('value', input);
	});

	$('.area_text').keyup(function(){
		main_input = $(this).val();
		$(this).attr('value', main_input);
	})



	$('.mess_button').click(function(){
		name = $('.give_text').val();
		message = $('.area_text').val();

		$.post('/engine/chat.php', {name : name, message: message}, function(data){
			location.reload();
		});

	});
	$('.delete').click(function(){
		id_mess = $(this).attr('id_mess');
		$.post('/engine/delete.php', {id_mess : id_mess}, function(data){
			location.reload();
		});
	});
}