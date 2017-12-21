function showEdit(){
	$("#edit").show();
	$("#single").hide();
}
jQuery.validator.addMethod( "date", function( value, element ) {
	return this.optional( element ) || /^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[01])$/.test( value );
}, "Please enter date format eg.yyyy-mm-dd" );
jQuery(document).ready(function($) {
	

	$("#country").on("change",function(){
		 $.ajax({
				url: siteUrl + "team/get",
				type: 'POST',
				data: {id:$(this).val(),type:"countries"},
				success: function(result) {
					console.log(result);
					try{
						var resultObj = $.parseJSON(result);
						var data = resultObj.data;
						$("#state").html('<option value="">state</option>');
						for(i= 0; i < data.length;i++){
							$("#state").append('<option value="' + data[i].id + '" >' + data[i].name + '('+ data[i].state_shorname +')</option>');
						}
						 $('select').material_select();
						
						 
					}catch(e){
						alert(e);
					}
				}
			});
	});
	$("#state").on("change",function(){
		$.ajax({
				url: siteUrl + "team/get",
				type: 'POST',
				data: {id:$(this).val(),type:"state"},
				success: function(result) {
					console.log(result);
					try{
						var resultObj = $.parseJSON(result);
						var data = resultObj.data;
						$("#cities ul").html('');
						for(i= 0; i < data.length;i++){
							$("#cities ul").append( '<li>' + data[i].name +'</li>');
						}
						
						 
					}catch(e){
						alert(e);
					}
				}
			});
	});
	

	/* Login form validate */
	$('#login-form').validate();
	$('#create-gallery-form,#edit-gallery-form').validate();
	$('form').validate();
	

	$(".delete").on('click', function(event) {
		var _that = $(this);
		var id = _that.data('id');
		var action = _that.data('type');

		var r = confirm("Press a button!");
		if (r == true) {
			$.ajax({
				url: siteUrl + "action/remove",
				type: 'POST',
				data: {id:id,action:action},
				success: function(result) {
					try{
						var data = $.parseJSON(result);
						if (data.error == 1) {
							alert(data.msg);
						} else {
							$("tr.id-"+id).remove();
							$("li.id-"+id).remove();
							$(".full-image.id-"+id).remove();
						}
					}catch(e){
						alert("An error occurred. To delete.");
					}
				}
			});
		}
	});


	$("#login-form").on('submit', function(e) {
		e.preventDefault();
		var _that = $(this);

		if (_that.valid() ){

			var _notify = $(".form-notify");
			var _submit = $(this).find("input[type='submit']");
			_notify.html('<div class="isa_info"> <i class="fa fa-info-circle"></i> Loding... </div>');
			_submit.prop('disabled', true);
			var $form = $(e.target);
			$.ajax({
				url: $form.attr('action'),
				type: 'POST',
				data: $form.serialize(),
				success: function(result) {
					try{
						var data = $.parseJSON(result);
						console.log(data);
						if (data.error == 1) {
							_notify.html('<div class="isa_error"> <i class="fa fa-times-circle"></i>' + data.msg + '</div>');
							_submit.prop('disabled', false);
						} else {
							_notify.html('<div class="isa_success"><i class="fa fa-check"></i> ' + data.msg + ' </div>');
							_submit.prop('disabled', false);
							window.location.href = siteUrl ;

						}
					}catch(e){

						alert("An error occurred. To create event.");
						_submit.prop('disabled', false);
					}
				}
			});

		}
	});


$("#create-gallery-form,#edit-gallery-form").on('submit', function(e) {
	e.preventDefault();
	var _that = $(this);

	if (_that.valid() ){

		var _notify = $(".form-notify");
		var _submit = $(this).find("input[type='submit']");
		_notify.html('<div class="isa_info"> <i class="fa fa-info-circle"></i> Loding... </div>');
		_submit.prop('disabled', true);
		var $form = $(e.target);
		$.ajax({
			url: $form.attr('action'),
			type: 'POST',
			data: $form.serialize(),
			success: function(result) {
				try{
					var data = $.parseJSON(result);
					if (data.hasOwnProperty('redect')) {
						window.location.href = data.redect;
					}
					
					if (data.error == 1) {
						_notify.html('<div class="isa_error"> <i class="fa fa-times-circle"></i>' + data.msg + '</div>');
						_submit.prop('disabled', false);
					} else {
						if (data.hasOwnProperty('updated')) {
							window.location.reload();
						}else{ 
							$("#responsed-image").append('<div class="responed-image-icon"><a href="'+ siteUrl + 'gallery/edit?id=' +data.id+'"><img src="' + data.imageurl + '" /></a></div>');
							 
							$form.find("input[type=text], textarea").val("");
							_notify.html('<div class="isa_success"><i class="fa fa-check"></i> ' + data.msg + ' </div>');
							_submit.prop('disabled', false);
						}

					}
				}catch(e){

					alert("An error occurred.");
					console.log(result);
					_submit.prop('disabled', false);
				}
			}
		});

}
});


$("#create-news-form, #update-news-form").on('submit', function(e) {
	e.preventDefault();
	var _that = $(this);

	if (_that.valid() ){

		var _notify = $(".form-notify");
		var _submit = $(this).find("input[type='submit']");
		_notify.html('<div class="isa_info"> <i class="fa fa-info-circle"></i> Loding... </div>');
		_submit.prop('disabled', true);
		var $form = $(e.target);
		$.ajax({
			url: $form.attr('action'),
			type: 'POST',
			data: $form.serialize(),
			success: function(result) {
				try{
					var data = $.parseJSON(result);
					if (data.hasOwnProperty('redect')) {
						window.location.href = data.redect;
					}

					if (data.error == 1) {
						_notify.html('<div class="isa_error"> <i class="fa fa-times-circle"></i>' + data.msg + '</div>');
						_submit.prop('disabled', false);
					} else {
						_notify.html('<div class="isa_success"><i class="fa fa-check"></i> ' + data.msg + ' </div>');
						_submit.prop('disabled', false);
						window.location.reload();

					}
				}catch(e){
					alert(e);
				}

			}
		});

	}
});





$("#edit-http-form").on('submit', function(e) {
	e.preventDefault();
	var _that = $(this);

	if (_that.valid() ){

		var _notify = $(".form-notify");
		var _submit = $(this).find("input[type='submit']");
		_notify.html('<div class="isa_info"> <i class="fa fa-info-circle"></i> Loding... </div>');
		_submit.prop('disabled', true);
		var $form = $(e.target);
		$.ajax({
			url: $form.attr('action'),
			type: 'POST',
			data: $form.serialize(),
			success: function(result) {
				try{
					var data = $.parseJSON(result);
					if (data.hasOwnProperty('redect')) {
						window.location.href = data.redect;
					}

					if (data.error == 1) {
						_notify.html('<div class="isa_error"> <i class="fa fa-times-circle"></i>' + data.msg + '</div>');
						_submit.prop('disabled', false);
					} else {
						_notify.html('<div class="isa_success"><i class="fa fa-check"></i> ' + data.msg + ' </div>');
						_submit.prop('disabled', false);
						// window.location.reload();

					}
				}catch(e){
					alert(e);
				}

			}
		});

	}
});
});