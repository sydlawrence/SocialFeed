<?php 
$i = 1;
foreach ($links as $title => $url): 
	$class = "";
	if (url::current() == $url)
		$class .= "selected";
?>	
	<?php echo html::anchor($url, html::specialchars($title),array('class'=>$class)) ?>
	<?php
	if ($i != count($links))
		echo "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;";
	$i++;
endforeach ?>