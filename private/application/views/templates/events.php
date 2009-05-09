<?php if (isset($header)) echo $header; ?>
<?php if (isset($banner)) echo $banner; ?>

<h2>All Events</h2>
<?php
foreach ($all_events as $evt) {
	echo '<li><a href="'.$evt->get_url().'">'.zest::render_image($evt->media, array('width'=>100,'height'=>100)).$evt->get_date('d m y').' - '.$evt->title.'</a></li>';
}
echo $all_pagination;
?>

<h2>Future Events</h2>
<?php
foreach ($future_events as $evt) {
	echo '<li><a href="'.$evt->get_url().'">'.zest::render_image($evt->media, array('width'=>100,'height'=>100)).$evt->get_date('d m y').' - '.$evt->title.'</a></li>';
}
echo $future_pagination;
?>

<h2>Past Events</h2>
<?php
foreach ($past_events as $evt) {
	echo '<li><a href="'.$evt->get_url().'">'.zest::render_image($evt->media, array('width'=>100,'height'=>100)).$evt->get_date('d m y').' - '.$evt->title.'</a></li>';
}
echo $past_pagination;
?>


<?php if (isset($footer)) echo $footer; ?>
