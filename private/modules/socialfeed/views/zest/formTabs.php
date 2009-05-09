
<form method="post" class="valid_form" action="<?php echo $action?>">
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
</div>
</div>
</form>