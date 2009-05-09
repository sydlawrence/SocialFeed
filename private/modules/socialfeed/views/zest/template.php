<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link REL="SHORTCUT ICON" HREF="/zest/favicon.ico">
	<title><?= html::specialchars($title)?></title>
	<?php
	echo html::stylesheet(array
						(
    						'zest/css/reset.css',
    						'zest/css/forms.css',
    						'zest/css/navigation.css',
    						'zest/css/layout.css',
    						'zest/css/typography.css',
    						'zest/css/design.css',
    						'zest/css/jquery.thickbox.css',
    						'zest/css/jquery.datePicker.css',
    						'zest/css/jquery.tooltip.css',
    						'zest/css/jquery.validate.css',
    						'zest/css/jquery.autocomplete.css',
						),
   						'screen',
   						FALSE
   					);
					
	echo html::script(array
						(
							'zest/js/tiny_mce/tiny_mce.js',
    						'zest/js/jquery-1.2.6.min.js',
    						'zest/js/ui.jquery.js',
    						'zest/js/application.js',
    						'zest/js/jquery.thickbox.js',
    						'zest/js/date.js',
    						'zest/js/jquery.datePicker.js',
							'zest/js/jquery.ajaxSortable.js',
							'zest/js/jquery.corner.js',
							'zest/js/jquery.simpletip.js',
							'zest/js/jquery.validate.js',
							'zest/js/jquery.autocomplete.js',
						),
						FALSE
					);
?>

<script type="text/javascript" src="http://www.bernardopadua.com/nestedSortables/externals/released-externals/interface-1.2.js"></script>
<script type="text/javascript" src="http://www.bernardopadua.com/nestedSortables/compressed/nested_sortable/inestedsortable.js"></script>

<script type="text/javascript" src="http://www.bernardopadua.com/nestedSortables/compressed/widget/jquery.nestedsortablewidget.js"></script>


<script type="text/javascript">
$(document).ready(function(){
		<?php
		if (isset($error_message) && $error_message != "") {
		?>	
		error('<?php echo $error_message?>');
		<?php }
		if (isset($alert_message) && $alert_message != "") { ?>
		alert('<?php echo $alert_message?>');
		<?php }
		if (isset($success_message) && $success_message != "") { ?>
		success('<?php echo $success_message?>');
		<?php } ?>
		
		$('.tooltip').tooltip({
			top: -170, 
   		 	left: 5
		});
		
});

<?php
if (isset($extraJS)) {
	echo $extraJS;
}
?>

tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
	editor_deselector : "no-editor",
	plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

	// Theme options
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	width : 740,
	height: 500,
	content_css : "/assets/css/layout.css",
	relative_urls : false



	
});

</script>	
	
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
			<div id="topLinks">
				<?php foreach ($topLinks as $title => $url):
					$class="";
					if (url::current() == $url)
						$class .= "active";
					
					echo html::anchor($url, html::specialchars($title),array('class'=>$class)) ?>&nbsp;
				
				<?php endforeach ?>
			</div>
			<h1>Hello!</h1>
			<h2>Welcome to your Social Feed</h2>
			<h3>Here you can write a blog, manage external feeds and much much more...</h3>
			<div id="message">

				<p id="error"></p>
				<p id="warning"></p>
				<p id="confirm"></p>
			</div>
			
			<ul id="topNav" class="spacer nav">
				<div class="right">
					
					<?php
					
					foreach ($rightLinks as $title => $url): 
							$class="right";
							if (url::current() == $url || "admin/".$this->uri->segment('admin') == $url)
								$class = " active";
							?>
						<li><?php echo html::anchor($url, html::specialchars($title),array('class'=>$class)) ?></li>
					<?php endforeach ?>
				</div>
				<!-- class="active" -->
				<?php 
					$i = 0;
					foreach ($mainLinks as $title => $url): ?>
					<li>
					<?php 
					$class="";
					if ($i == 0)
						$class.="first ";
					if (url::current() == $url || "admin/".$this->uri->segment('admin') == $url)
						$class .= "active";
					$i++;
					echo html::anchor($url, html::specialchars($title),array('class'=>$class));
					?>
					</li>
				<?php endforeach ?>
								

			</ul>
			
			<div id="title" class="spacer">
				<div class="right" id="userDetails">
					You are currently logged in as <?php echo $username?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url::site('admin/logout') ?>"><?=html::image(array('src' => 'zest/images/icon_logout.gif', 'style'=>'vertical-align:middle;','alt' => '[ logout ]'))?></a>
				</div>
				<?php echo $heading ?>			</div>
		</div>

	</div>
	<div id="main" class="spacer">
		<div class="wrapper" id="body">
			<?php echo $content ?>
		</div>
	</div>

	<div id="footer">
		<div class="wrapper">
			<a href="http://www.marmaladeontoast.co.uk" target="_BLANK" title="marmalade on toast">
				<?php
					echo html::image(array('src' => 'zest/images/marmalade.gif', 'alt' => '&copy; marmalade on toast'));
				?>
			</a>
		</div>
	</div>
	
	<!--
	<script type="text/javascript" src="http://www.syddev.com/under_development.js"></script>
	-->
	
</body>
</html>
