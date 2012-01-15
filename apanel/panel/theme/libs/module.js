$(function() {
	init();
	
});

function init(){

	// SKIN FORM
	$('input[type="checkbox"]').ezMark();
	$('input[type="radio"]').ezMark();
	$("select").selectbox({
		onOpen: function (inst) {
		},
		onClose: function (inst) {
		},
		onChange: function (val, inst) {
		},
		effect: "slide"
	});
	
	$('.allCheckBox').click(function(){
		if($(this).attr("checked")){
			console.log('off');
			$('.ez-checkbox input').attr("checked", true);
			$('.ez-checkbox').addClass('ez-checked');
		} else {
			$('.ez-checkbox input').attr("checked", false);
			$('.ez-checkbox').removeClass('ez-checked');
		}
	});
	
}

