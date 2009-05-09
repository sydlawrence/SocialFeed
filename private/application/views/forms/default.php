<?php
$validate = array();
/*
$validate = array(
	field_name => array(rule,error_message),
);
*/
?>

<input name="validate" type="hidden" value='<?=addslashes(serialize($validate))?>' />

<!-- FORM ELEMENTS -->