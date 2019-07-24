<div id="recipieStatus"></div>
<form id="recipieForm" style="line-height: 30px; color:#531000;">
<div class="form-group">
	<label>Title :</label><br>
	<input type="text" id="r_inputTitle" class="form-control">
</div>
CONTENT_EDITOR
<div class="form-group">
	<label>Ingredients :</label><br>
	<input type="text" id="r_inputIngredients" class="form-control">
</div>

<div class="form-group">
	<label>Cooking Time :</label><br>
	<input type="text" id="r_inputTime" class="form-control">
</div>
<div class="form-group">
	<label>Cooking Utensils :</label><br>
	<input type="text" id="r_inputUtensils" class="form-control">
</div>
<div class="form-group">
	<label>Cooking Level : </label><br>
	<select class="form-control" id="r_inputLevel">
	<option value="Beginner">Beginner</option>
	<option value="Intermediate">Intermediate</option>
	<option value="Advanced">Advanced</option>
	</select>
</div>
<div class="form-group">
	<label>Meal Type : </label><br>
	<input type="text" id="r_inputMealType" class="form-control">
</div><br>
<div class="form-group">
	<button type="submit" class="btn btn-primary">Submit recipie</button>
</div>
</form>