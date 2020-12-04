$(document).ready(function($){
	/* Money mask R$ */
	$('.money').mask('#.##0,00', {reverse: true});
	/* Only number on Dimensions Mask*/
	$('.number').mask('0000000');

	/* New sp state phones Mask */
	var SPMaskBehavior = function (val) {
	return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
	onKeyPress: function(val, e, field, options) {
		field.mask(SPMaskBehavior.apply({}, arguments), options);
	}
	};
	$('.sp_celphones').mask(SPMaskBehavior, spOptions);

});
	
/* Load JavaScript only after document */
$(window).bind("load", function() {

	$("#submitBtn").click(function() {
		/* this function load all data from form to an modal table called before submit */ 
		$("#mName").text($("#name").val());
		$("#mCategory").text($("#category option:selected").text());
		$("#mSupplier").text($("#supplier option:selected").text());
		$("#mCostsPrice").text("R$ " + $("#costsprice").val());
		$("#mSalesPrice").text("R$ " + $("#salesprice").val());
		$("#mProductDesc").text($('#productdesc').val());
		$("#mHeight").text($("#height").val() + " cm");
		$("#mWidth").text($("#width").val() + " cm");
		$("#mDepth").text($("#depth" ).val() + " cm");
		$("#mWeight").text($("#weight").val() + " g");
		$("#mSac").text($("#sac").val());									
	});

	$('#submit').click(function(){
		/* when the submit button in the modal is clicked, submit the form */
		$('#formfield').submit();
	});


});

