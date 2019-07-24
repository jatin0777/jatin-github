jQuery(function($){
	$('#recipie_rating').bind("rated",function(){
		$(this).rateit("readonly",true);

		var formObj = {
			action : "r_rate_recipie",
			rid    : $(this).data("rid"),
			rating : $(this).rateit("value")
		}

		$.post(recipie_obj.ajax_url, formObj,function(data){
			console.log(data);
		});
	});




	$(document).on('submit','#recipieForm', function(e){
		e.preventDefault();
		$(this).hide();
		$('#recipieStatus').html('<div class="alert alert-info">Please wait we are submitting your recipie.</div>');
		var formObj = {

			action:                     'r_submit_user_recipie',
			title:                       $("#r_inputTitle").val(),
			content:                     tinymce.activeEditor.getContent(),
			ingredients:                 $("#r_inputIngredients").val(),
			time:                        $("#r_inputTime").val(),
			utensils:                    $("#r_inputUtensils").val(),
			level:                       $("#r_inputLevel").val(),
			meal_type:                   $("#r_inputMealType").val()

		};

		$.post(recipie_obj.ajax_url, formObj, function(data){
			console.log(data);
			if(data.status === 2){
				$('#recipieStatus').html('<div class="alert alert-success">Recipie submitted sucessfully</div>');
			}else{
				$('#recipieStatus').html('<div class="alert alert-danger">Error submitting recipie</div>');
				$('#recipieForm').show();
			}
		});
	});






});