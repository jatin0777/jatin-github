<?php

function r_recipie_options_mb( $post ) { 

	$recipie_data = get_post_meta($post->ID,'recipie_data',true);

	if(!$recipie_data){
		$recipie_data = array(
			'ingredients'=>'',
			'time' => '',
			'utensils' => '',
			'level' => 'Beginner',
			'meal_type' => ''
		);
	}

?>

<div class="form-group">
	<label>Ingredients</label>
	<input type="text" name="r_inputIngredients" class="form-control" 
	value="<?php echo $recipie_data['ingredients']; ?>">
</div>
<div class="form-group">
	<label>Cooking Time</label>
	<input type="text" name="r_inputTime" class="form-control" value="<?php echo $recipie_data['time']; ?>">
</div>
<div class="form-group">
	<label>Cooking Utensils</label>
	<input type="text" name="r_inputUtensils" class="form-control" value="<?php echo $recipie_data['utensils']; ?>">
</div>
<div class="form-group">
	<label>Cooking Level</label>
	<select class="form-control" name="r_inputLevel">
	<option value="Beginner">Beginner</option>
	<option value="Intermediate" <?php echo $recipie_data['level'] == 'Intermediate' ? 'SELECTED' :'';?>>Intermediate</option>
	<option value="Advanced" <?php echo $recipie_data['level'] == 'Advanced' ? 'SELECTED' :'';?>>Advanced</option>
	</select>
</div>
<div class="form-group">
	<label>Meal Type</label>
	<input type="text" name="r_inputMealType" class="form-control" value="<?php echo $recipie_data['meal_type']; ?>">
</div>
<?php
}