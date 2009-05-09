<?php
if (count($tabs) > 1) {
?>

<ul class="subnav nav spacer tabs">
	<?php
		$i = 1;
		$r = rand(0,100);
		foreach ($tabs as $title => $content):
			
			echo "<li><a href='#tab_".str_replace('.','',str_replace("...","_",str_replace(" ","_",trim(strip_tags($title)))))."_".$r."'>$title</a></li>";
			$i++;
		endforeach
		?>
</ul>
<?php

$i = 1;
foreach ($tabs as $title => $content):
	echo "<div id='tab_".str_replace('.','',str_replace("...","_",str_replace(" ","_",trim(strip_tags($title)))))."_".$r."' class='content tab'>$content</div>";
	$i++;
endforeach;

}
else {
foreach ($tabs as $title => $content):
	echo "<div class='content'>$content</div>";
endforeach;


}
?>