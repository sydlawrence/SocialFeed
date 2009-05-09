<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php if(isset($seoTitle)) echo html::specialchars($seoTitle);?></title>
<?php

	echo html::stylesheet(array
						(
    						'assets/css/reset.css',
    						'assets/css/forms.css',
    						'assets/css/navigation.css',
    						'assets/css/layout.css',
    						'assets/css/typography.css',
    						'assets/css/design.css',
    						'assets/css/jquery.thickbox.css',
    						'assets/css/jquery.datePicker.css',
						),
   						'screen',
   						FALSE
   					);
					
	echo html::script(array
						(
    						'assets/js/jquery-1.2.6.min.js',
    						'assets/js/ui.jquery.js',
    						'assets/js/jquery.thickbox.js',
    						'assets/js/jquery.cycle.js',

						),
						FALSE
					);



if (isset($extraHead)) {
	echo $extraHead;
}
?>

<script type="text/javascript">
$(function() {
	$('#s1').cycle('fade');	


$('#s3').cycle({ 
    fx:    'scrollRight', 
    timeout: 8000, 
    speed:   3000 ,
});

$('#s2').cycle({ 
    fx:      'custom', 
    sync: 0, 
    cssBefore: {  
        top:  0, 
        left: 932, 
        display: 'block' 
    }, 
    animIn:  { 
        left: 0 
    }, 
    animOut: {  
        top: 500 
    }, 
    timeout: 8000
});

});
<?php
if (isset($extraJS)) {
	echo $extraJS;
}
?>
</script>	

<style type="text/css">
<?php
if (isset($extraCSS)) {
	echo $extraCSS;
}
?>
</style>

</head>
<body>
	<div id="head">
		<div class="wrapper">
			<div id="logo">
			<a href="/admin">
			<?php
				echo html::image(array('src' => 'zest/images/logo.jpg', 'alt' => 'logo'));
			?>
			</a>
			</div>
			
			
			<ul id="topNav" class="spacer nav">
			<?php
			// echo $navbar[0];
			?>
			</ul>
			
			
		</div>	
		<div id="topContent" class="spacer">
			<div class="wrapper">
				
				<?php 
				if (isset($page) && $page->id == 1) {
				?>
				
				
				<div id="s2" style="width:100%;height:250px;overflow:hidden">
				<div style="width:100%;height:250px">
					<img src="/assets/img/screenshots.png" alt='screenshots' style="float:right" />
					<h2>Welcome to your Content Management System</h2>
					<h3>Here you can change all content, images and much more...</h3>
					<p>Aliquam aliquet, est a ullamcorper condimentum, tellus nulla fringilla elit, a iaculis nulla turpis sed wisi. Fusce volutpat. Etiam sodales ante id nunc. Proin ornare dignissim lacus. Nunc porttitor nunc a sem. Sed sollicitudin velit eu magna. Aliquam erat volutpat.</p>
				</div>
				
				<div style="width:100%;height:250px">
					<img src="/assets/img/screenshots.png" alt='screenshots' style="float:right" />
					<h2>'It's extremely user friendly'</h2>
					<h3>James Nichols, <a href="http://www.caracoli.co.uk" target="_blank">Caracoli<a/></h3>
					<p>"I am not the most technical person in the world, but I find using Zest an absolute breeze"</p>
				</div>
				
				</div>
				<div class="spacer">&nbsp;</div>
				
				<?php
				}
				else {
					if (isset($title)) {
					echo $title ;
					}
				}
				?>
			</div>
		</div>
	</div>
<div id="main" class="spacer">
	<div class="wrapper" id="body">