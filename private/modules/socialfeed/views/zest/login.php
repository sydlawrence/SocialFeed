<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title><?php echo html::specialchars($title) ?></title>

	<?php
	echo html::link(array
					(
						'zest/css/reset.css',
    					'zest/css/formss.css',
    					'zest/css/layout.css',
    					'zest/css/typography.css',
    					'zest/css/design.css',
    					'zest/css/login.css'
					),
					'stylesheet',
					'text/css',
					FALSE,
					'screen',
					null,
					TRUE
				);
					
	echo html::script(array
						(
    					//	'zest/js/tiny_mce/tiny_mce.js',
    						'zest/js/jquery-1.2.6.min.js',
    						'zest/js/ui.jquery.js',
    					//	'zest/js/application.js',
    					//	'zest/js/jquery.thickbox.js',
    					//	'zest/js/date.js',
    					//	'zest/js/jquery.datePicker.js',
						//	'zest/js/jquery.ajaxSortable.js',
						//	'zest/js/jquery.corner.js',
						),
						FALSE
					);
?>

<script type="text/javascript">
$(document).ready(function(){
	$(".hide").hide();
});

</script>

</head>

<body>
	<div id="head">
			<div id="logo">
			<?php
				echo html::image(array('src' => 'zest/images/logo.jpg', 'alt' => 'logo'));
			?>
			</div>
			<p>&nbsp;</p>
			<center>
			<div id="message">

				<p id="error"><?php echo $message; ?></p>
				<p id="warning"></p>
				<p id="confirm"></p>
			</div>
			
			<div id="loginBox">
				<?php echo $content ?>
			</div>
			<p style='font-size:12px;font-weight:bold;margin-bottom:10px;'><a href="http://www.zestcms.com" target="_blank">
			<?= $version ?>
			</a></p>
			<a href="http://www.marmaladeontoast.co.uk" target="_BLANK" title="marmalade on toast">
				<?php
					echo html::image(array('src' => 'zest/images/marmalade.gif', 'alt' => '&copy; marmalade on toast'));
				?>
			</a>
		</center>
	</div>
</body>
</html>
