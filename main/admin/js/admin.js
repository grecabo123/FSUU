$(document).ready(function() {
	
	// getdata();

	function notification_load(view = ''){
		$.ajax({
			url: "../get",
			method: "POST",
			data: {view:view},
			dataType: "json",
			success:function(data){
				// console.log(data.unseen_notification);
				$('.result').html(data.notification);
				if (data.unseen_notification > 0) {
					$('.noti').html(data.unseen_notification);
				}
			}
		});
	}

	$(document).on('click', '#display_form', function(event) {
		event.preventDefault();
		var id = $(this).closest('li').find('#click').text();
		$('.data').toggle();
		getdata(id)
	});

	function getdata(id){
		$.ajax({
			url: "../search",
			method: "POST",
			data: {
				'check' : true,
				id:id,
			},
			success:function(search_data){
				$.each(search_data, function(index, xyra) {
					$('#btn').remove();
					$('.student').text(xyra['student_id']);
					$('.td-name').text(xyra['last_name']+' '+xyra['first_name']+' '+xyra['middle_name']);
					$('.list-btn').append(' <ul id="btn">'+
						'<li><button id="view" value="'+xyra['ID']+'" title="Forward"><i class="fas fa-eye"></i></button></li>'+
                            '<li><button id="forward" value="'+xyra['Profile_fk']+'" title="Forward"><i class="fas fa-share-square"></i></button></li>'+
                            '<li><button id="delete" value="'+xyra['ID']+'" title="Forward"><i class="fas fa-trash"></i></button></li>'+
                            '<li><button id="file" value="'+xyra['ID']+'" title="Forward"><i class="fas fa-file-alt"></i></button></li>'+
                        '</ul>');
				});
			}
		});
	}

	$(document).on('click', '#forward', function(event) {
		event.preventDefault();
		var key = $('#forward').val();
		alert(key);
	});

	$(document).on('click', '#delete', function(event) {
		event.preventDefault();
		var delete_key = $('#delete').val();
		$.ajax({
			url: "../delete",
			method: "POST",
			data: {
				'delete' : true,
				delete_key: delete_key,
			},
			success:function(delete_data){
				
			}
		})
		/* Act on the event */
	});

	$(document).on('click', '#display_form', function(event) {
		event.preventDefault();
		$('.msg').removeClass('bg-active');
		/* Act on the event */
	});


	notification_load();


	$(document).on('click', '#report', function(event) {
		event.preventDefault();
		$('.msg').addClass('bg-active');
		$('.data').toggleClass('.hide');
		/* Act on the event */
	});
	$(document).on('click', '#close_msg', function(event) {
		event.preventDefault();
		$('.msg').removeClass('bg-active');
		/* Act on the event */
	});
	$(document).on('click', '#close_tbl', function(event) {
		event.preventDefault();
		$('.data').toggle();
	});

	$(document).on('click', '#report', function(event) {
		$('.noti').html('');
		$('.data').toggleClass('.hide');
		$('.msg').addClass('bg-active');
		notification_load('yes');
		/* Act on the event */
	});




	setInterval(function(){
		notification_load();
	},3000);



});