/* Load JavaScript only after document */
$(window).bind("load", function() {

	$("#submitBtn").click(function() {
		/* this function load all data from form to an modal table called before submit */ 
		$("#mName").text($('#name').val());							
	});

	$('#submit').click(function(){
		/* when the submit button in the modal is clicked, submit the form */
		$('#formfield').submit();
	});

});