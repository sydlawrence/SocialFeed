<a href="#" onclick="$('#add_new_button').hide();$('#new_image_form').show();return false" id="add_new_button" class="button">Add new image</a>



	<div class="hide" id="new_image_form">
		<form method="post" action="<?php echo url::site()?>admin/media/add" enctype="multipart/form-data" onsubmit="$('#image_upload_button').attr('value','Uploading...')">
			<label for='title'>Title</label><br/>
			<input type="text" name="title" id="title" />
			<label for='title'>Category</label><br/>
			<input type="text" name="image_category" id="image_category" class="media_category_complete" />
			<input type="file" name="file" id="file" />
			<input type="hidden" name="media_type_id" value="1" />
			<input class="submit" type="submit" value="Upload" id="image_upload_button">
		</form>
	</div>