$('#next').off('click').on('click',function(e){

	$('#hiddencheck').val('1');
	let ttt = $('#hiddencheck').val();

	console.log("button is "+ttt);

	$('#form2').submit();
});


$('#viewResume').off('click').on('click',function(e){
	$('#hiddencheck').val('10');

	$('#form2').submit();
});

$('.yes').off('click').on('click',function(e){
    $('#decision').val('yes');

    $('#decisive_form').submit();
});

$('.no').off('click').on('click',function(e){
    $('#decision').val('no');

    $('#decisive_form').submit();
});

 $(document).ready(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    // alert(maxDate);
    $('#todate').attr('max', maxDate);
    $('#fromdate').attr('max', maxDate);

    $('#fromdate').change(function(){
    	console.log('date change'+$(this).val());
    	$('#todate').attr('min', $(this).val());
    });

    $('#todate').change(function(){
    	console.log('date change'+$(this).val());
    	$('#fromdate').attr('max', $(this).val());
    });

    $('.current').change(function(){
    	console.log("Checked value "+$(this).val())
    	if(this.checked){
    		$('#todate').prop("disabled",true);
    		// $(this).val(1)
    	} else {
    		$('#todate').prop("disabled",false);
    		// $(this).val(0)
    	}
    });

    $('.current_value').each(function(){
    	console.log("value of current value is "+$(this).val())
    	if($(this).val()==1){
    		$('.current_label').hide();
    		return false;
    	}
    });

    $("[data-toggle=popover]").popover();

    // Auto Expand text area
    autosize($('textarea'));

});