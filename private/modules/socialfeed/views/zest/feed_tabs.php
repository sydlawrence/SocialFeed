<?php
if (count($tabs) > 1) {
?>

<ul class="feeds tabs">
	<?php
		$i = 1;
		foreach ($tabs as $title => $content):
			
			echo "<li><a href='#tab_$i'><img src='$title' /></a></li>";
			$i++;
		endforeach
		?>
</ul>
<?php

$i = 1;
foreach ($tabs as $title => $content):
	echo "<div id='tab_$i' class='content feeds tab'>$content</div>";
	$i++;
endforeach;

}
else {
foreach ($tabs as $title => $content):
	echo "<div class='content'>$content</div>";
endforeach;


}
?>