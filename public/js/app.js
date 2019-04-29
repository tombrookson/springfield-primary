App = {
	init: function(){

	}
};

App.Tests = {

	init: function(){
		var self = this;

		$('#add-result-submit').click(function(){
			self.addResult();
		});


		$('.add-result-btn').click(function(){
			$('.add-result-bg').show();
			$('.add-result').show();
			$('.add-result-error').text('');

			$('#add-result-student').val('');
			$('#add-result-result').val('');
			$('#add-result-test').val('');
		});

		$('.add-result-close').click(function(){
			$('.add-result-bg').hide();
			$('.add-result').hide();
		});

		$('.add-result-bg').click(function(){
			$(this).hide();
			$('.add-result').hide();
		});


		$('.test').click(function(){
			$('.test').removeClass('open');
			$(this).addClass('open');
		});
	},

	addResult: function()
	{
		var result = $('#add-result-result').val();
		if (result > 100) {
			result = 100;
			$('#add-result-result').val(100);
		}

		$('.add-result-error').text('');

		var id = $('#add-result-test').val() ? $('#add-result-test').val() : 0;

		$.ajax({
			url: '/api/tests/'+id,
			method: 'post',
			data: {
				student_id: $('#add-result-student').val(),
				result: result
			},
			success: function(e){
				if (e.type === 'SUCCESS') {
					$('.add-result-bg').hide();
					$('.add-result').hide();

					location.reload();
				} else {
					$('.add-result-error').text(e.msg);
				}
			}
		});
	}
};

App.Students = {

	init: function(){
		$('.test').click(function(){
			$('.test').removeClass('open');
			$(this).addClass('open');
		});
	}
};