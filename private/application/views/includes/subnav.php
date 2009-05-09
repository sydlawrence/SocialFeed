<?php
if (isset($products)) {
foreach ($products as $product): 
?>
	<li><?php echo html::anchor("products/".urlencode($product->title), html::specialchars($product->title)) ?></li>
<?php 
endforeach
?>
<?php
}
?>


<?php foreach ($links as $title => $url): 
	$class = "";
	if (url::current() == $url)
		$class .= "on";
?>
	<li><?php echo html::anchor($url, html::specialchars($title),array('class'=>$class)) ?></li>
<?php endforeach ?>
