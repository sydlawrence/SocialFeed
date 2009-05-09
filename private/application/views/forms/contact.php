<?php
$validate = array(
	"email" => array(array('required','valid::email'),"Your email must be valid"),
	"enquiry" => array("required","You must write an enquiry"),
	'forename' => array("required","Your forename is required"),
);
?>

<input name="validate" type="hidden" value='<?=addslashes(serialize($validate))?>' />

<p><label for="forename">Forename</label>
	<input name="forename" type="text" value="" /></p>
<p><label for="surname">Surname</label>
	<input name="surname" type="text" value="" /></p>
<p><label for="email">Email</label>
	<input name="email" type="text" value="" /></p>
<p><label for="telephone">Telephone</label>
	<input name="telephone" type="text" value="" /></p>
<p><label for="enquiry">Enquiry</label></p>
	<p><textarea cols="0" rows="0" name="enquiry"></textarea></p>

<p><input type="submit" src="/zest/images/submit_btn.gif" style="width:auto" value="submit" /></p>
