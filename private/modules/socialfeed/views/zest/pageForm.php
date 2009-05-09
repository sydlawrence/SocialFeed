<form method="post" action="<?php echo $action?>" class="valid_form" id="page_form">
<ul class="subnav nav spacer tabs">
	<?php
		$i = 1;
		foreach ($tabs as $title => $content):
			echo "<li><a href='#tab$i'>$title</a></li>";
			$i++;
		endforeach
		?>
</ul>
<div class="content">
<?php
$i = 1;
foreach ($tabs as $title => $content):
	echo "<div id='tab$i'>$content</div>";
	$i++;
endforeach
?>

<div id='extras'>
<?php
echo $extras;
?>
</div>
<div class="margin">
<input class="submit" type="submit" value="Save" />
<a href="#" onclick="$('#page_form').attr('target','_blank');$('#page_form').attr('action','<?=url::site()?>admin/preview/<?=$id?>');$('#page_form').submit();$('#page_form').attr('target','');$('#page_form').attr('action','<?=$action?>');return false;" class="button">Preview</a>
</div>
</div>
</form>