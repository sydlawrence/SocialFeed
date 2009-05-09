<form method="post" action="<?php echo url::site()?>admin/pages/post">
<div class='padding'>				
		<label for='page_title'>Page Title</label>
		<input type='text' name='page_title' id='page_title' rel='page_seo_url' value='' onkeypress='toUrl(event,'page_title')' class='fullWidth' />
	</div>
	<hr />
	<div class='padding'>				
		<label for='page_seo_url'>SEO URL</label>
		<p>We recommend using the same as the Page Title but instead of spaces, ' ', use the plus symbol, '+'</p>
		<p>no punctuation can be used</p>
		<input type='text' name='page_seo_url' id='page_seo_url' onkeypress='this.value = this.value.replace(' ','+')' value='' class='fullWidth' />
	</div>
	<hr />
	<div class='padding'>				
		<label for='parent_id'>Parent Page</label>
		<select id='parent_id' class='fullWidth'>
			<option>-- NONE --</option>
			
			<option>This is a Page</option>
			<option>This is a Page</option>
			<option>This is a Page</option>
			<option>This is a Page</option>
		
			
		</select>			
	</div>
	<hr />
	
	<div class='padding' style='background-color:#fff'>	
		<input type='submit' class='submit' value='Save'>
	</div>
</form>