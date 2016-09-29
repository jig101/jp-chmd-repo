jQuery(document).ready(function($) {
	$('#cButton').click(function() {
		$('#contact-msg').html('<img src="http://mailgun.github.io/validator-demo/loading.gif" alt="Loading...">');
		var message = $('#message').val();
		var name = $('#name').val();
		var number = $('#phoneNumber').val();
		var email = $('#email').val();
		if (!message || !name || !email || !number) {
			$('#contact-msg').html('At least one of the form fields is empty.');
			return false;
		} else {
			$.ajax({
				type: 'POST',
				url: ajx.ajax_url,
				data: $('#contactform').serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.status == 'success') {
						$('#contactform')[0].reset();
					}
					$('#contact-msg').html(response.errmessage);
				}
			});	
		}
	});
});